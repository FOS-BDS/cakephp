<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')){
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
                // Prior to 2.3 use
                // `return $this->redirect($this->Auth->redirect());`
            }else{
                echo 'sai dang nhap';
            }
        }
    }
    public function admin_add() {

    }
}