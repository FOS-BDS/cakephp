<?php
/**
 * Created by PhpStorm.
 * User: Kudo
 * Date: 4/3/2017
 * Time: 9:49 PM
 */
App::uses('AppController', 'Controller');
class CategoriesController extends AppController {
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
        $this->loadModel('Menu');
        $menus = $this->Menu->find('list',array('fields'=>array('id','title')));
        if ($this->request->is('post') || $this->request->is('put')){
            if ($this->Category->save($this->request->data)){
                $this->Session->setFlash('This category is saved','success', array(), 'success');
                $this->redirect('add');
            }
        }
        $this->set(compact('menus'));
    }
    public function admin_object_add() {
        $this->layout = 'default';
        $this->set('title_for_layout','Add object - highest menu');
        if ($this->request->is('post') || $this->request->is('put')){
            $this->loadModel('Menu');
            if ($this->Menu->save($this->request->data)){
                $this->Session->setFlash('This category is saved','success', array(), 'success');
                $this->redirect('object_add');
            }
        }
    }
} 