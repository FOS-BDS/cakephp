<?php
App::uses('AppController', 'Controller');

class WebhooksController extends AppController {
    private $verify_token = "verify";
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','getToken');
    }
	public function getToken() {
        $this->autoRender = false;

        $this->checkWebhook();
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
        if($this->request->is('post')){
            $input = json_decode(file_get_contents('php://input'), true);
            $fanpage_id = isset($input['entry'][0]['id']) ? $input['entry'][0]['id'] : NULL;
            $sender = isset($input['entry'][0]['messaging'][0]['sender']['id']) ? $input['entry'][0]['messaging'][0]['sender']['id'] : NULL;
            $message_text = isset($input['entry'][0]['messaging'][0]['message']['text']) ? $input['entry'][0]['messaging'][0]['message']['text'] : NULL;
            $attachments = isset($input['entry'][0]['messaging'][0]['message']['attachments']) ? $input['entry'][0]['messaging'][0]['message']['attachments'] : NULL;
            $payload = isset($input['entry'][0]['messaging'][0]['postback']) ? $input['entry'][0]['messaging'][0]['postback'] : NULL;
            $quick_reply = isset($input['entry'][0]['messaging'][0]['message']['quick_reply']['payload']) ? $input['entry'][0]['messaging'][0]['message']['quick_reply']['payload'] : NULL;
            if(!empty($fanpage_id)){
                CakeLog::info('call again .' . $fanpage_id);
                try{
                    $this->sendMessageToUser($sender,$message_text);
                }catch (Exception $e){
                    CakeLog::error('error sendmessage'. $e->getMessage());
                }
            }else{
                CakeLog::error('missing fanpage id');
            }
        }
    }
    private function sendMessageToUser($sender,$message_text){
        $messageData =array('recipient'=>array('id'=>$sender),'message'=>array('text'=>'xin chao ban'));
        $this->callSendAPI($messageData);
    }
    private  function callSendAPI($messageData){
        try{
            App::uses('HttpSocket', 'Network/Http');

            $request = array(
                'header' => array('Content-Type' => 'application/json')
            );
            $HttpSocket = new HttpSocket();
            $response = $HttpSocket->post(
                'https://graph.facebook.com/v2.8/me/messages?access_token=EAAW0Hxf6ZCx8BAAZCWUSPz85BSoCRWn7ZAIcyPPor3wXDGHZAZCuU1sI7fGZCesEbyZBUmmvz1zZAQLWZC8Wdb7bxPXiuSJ5p5dHzNOihiUIEZBrZAMZC5504AyqF45pkycibiLkVblTBU6dkZBKbCCMmZCg59OJZBYuZAJ95VPZAaxcBM2M4XAZDZD',
                json_encode($messageData),
                $request
            );
            $response_result = json_decode($response);
            if(isset($response_result->error)){
                CakeLog::error('Lỗi gửi tin nhắn' . $response .'data send' .json_encode($messageData));
            }
        }catch (Exception $e){
            CakeLog::error('Khong gui dc message' . $e->getMessage());
        }

    }
}
