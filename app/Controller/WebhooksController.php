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
    }
}
