<?php
App::uses('AppController', 'Controller');

class WebhooksController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','getToken');
    }
	public function getToken() {
        echo 123;die;
	}
}
