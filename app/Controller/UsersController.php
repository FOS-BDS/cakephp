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
            if($this->User->save($this->request->data)){
                $this->Session->setFlash('Add successful.','success', array(), 'success');
                $this->redirect(array('controller'=>'users','action'=>'index'));
            }else{
                $this->Session->setFlash('Add fail.','error', array(), 'error');
            }

        }
    }
    public function logout() {
        $this->Session->destroy();
        $this->Cookie->destroy();
        return $this->redirect($this->Auth->logout());
    }
    public function admin_index() {
        $this->User->recursive = -1;
        $this->Paginator->settings['User']['limit'] = 20;
        $users = $this->Paginator->paginate();
        $this->set('users',$users);
    }
    public function admin_delete($id) {
        $this->User->delete($id);
        $this->Session->setFlash('Delete successful.','success', array(), 'success');
        $this->redirect(array('controller'=>'users','action'=>'index'));
    }
    public function admin_edit($id) {
        if($this->request->is('post') || $this->request->is('put')){
            $this->User->id = $id;
            if($this->User->save($this->request->data)){
                $this->Session->setFlash('Data saved','success', array(), 'success');
            }else{
                $this->Session->setFlash('Có lỗi xảy ra.','error', array(), 'error');
            }
        }
            $user = $this->User->findById($id);
            $this->request->data = $user;
    }
}