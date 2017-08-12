<?php
class UsersController extends AppController {
    public $components = array(
        'Auth',
        'Session',
        'Cookie',
        'Paginator',
    );
    public function beforeFilter() {
        parent::beforeFilter();
//        $this->Auth->allow('admin_add');
    }
    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')){
            if ($this->Auth->login()) {
                return $this->redirect(array('controller'=>'Administrators','admin'=>true));
                // Prior to 2.3 use
                // `return $this->redirect($this->Auth->redirect());`
            }else{
                $this->Session->setFlash('Sai username hoặc password','error', array(), 'error');
            }
        }
    }
    public function admin_add() {
        if ($this->request->is('post')){
            $this->User->save($this->request->data);
        }
    }
    public function logout() {
        $this->Session->destroy();
        $this->Cookie->destroy();
        return $this->redirect($this->Auth->logout());
    }
}