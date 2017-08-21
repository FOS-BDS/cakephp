<?php
App::uses('AppController', 'Controller');

class WebhooksController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','getToken');
    }
	public function getToken() {
        $this->autoRender = false;

        $this->checkWebhook();

        $input = json_decode(file_get_contents('php://input'), true);

        $fanpage_id = isset($input['entry'][0]['id']) ? $input['entry'][0]['id'] : NULL;
        $sender = isset($input['entry'][0]['messaging'][0]['sender']['id']) ? $input['entry'][0]['messaging'][0]['sender']['id'] : NULL;
        $message_text = isset($input['entry'][0]['messaging'][0]['message']['text']) ? $input['entry'][0]['messaging'][0]['message']['text'] : NULL;

        // view tạm dữ liệu khi đang dev
        $this->sendMessageText( $fanpage_id, $sender, 'var_dump => ' . json_encode($input) );

        $this->solveReceiverMessageText($fanpage_id, $sender, $message_text);
        // lưu log khi user chat với bot
        $this->saveLogToBigQuery($sender, $fanpage_id, 'chat');

        $this->saveUserInfoChatWithBot($fanpage_id, $sender);

        if( !empty($input['entry'][0]['messaging'][0]['postback']) ) {
            $this->solvePostback( $sender, $input['entry'][0]['messaging'][0]['postback'], $fanpage_id );
        }

        if( !empty($input['entry'][0]['messaging'][0]['message']['quick_reply']) ) {
            $this->solveQuickReply($sender, $input['entry'][0]['messaging'][0]['message']['quick_reply'], $message_text, $fanpage_id);
        }
	}
    private function checkWebhook() {
        $hub_verify_token = null;

        if(isset($_REQUEST['hub_challenge'])) {
            $challenge = $_REQUEST['hub_challenge'];
            $hub_verify_token = $_REQUEST['hub_verify_token'];
        }


        if ($hub_verify_token === $this->verify_token) {
            echo $challenge;
        }
    }
}
