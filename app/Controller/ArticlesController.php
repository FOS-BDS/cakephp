<?php
/**
 * Created by PhpStorm.
 * User: Kudo
 * Date: 4/3/2017
 * Time: 9:49 PM
 */
App::uses('AppController', 'Controller');
class ArticlesController extends AppController {
    public $components = array(
        'Auth',
        'Session',
        'Cookie',
        'Paginator',
    );
    public function beforeFilter() {
        parent::beforeFilter();
    }
    public function add(){
        $this->layout = 'default';
    }
    public function admin_add() {
        $this->layout = 'default';
        $this->loadModel('Category');
        $categorys = $this->Category->find('list',array('fields'=>array('id','title')));
        if ($this->request->is('post') || $this->request->is('put')){
            $this->Article->save($this->request->data);
            $this->Session->setFlash('This Articles is saved','success', array(), 'success');
        }
        $this->set(compact('categorys'));
    }
} 