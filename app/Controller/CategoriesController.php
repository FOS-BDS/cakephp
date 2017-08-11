<?php
/**
 * Created by PhpStorm.
 * User: Kudo
 * Date: 4/3/2017
 * Time: 9:49 PM
 */

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
        if ($this->request->is('post') || $this->request->is('put')){
            if ($this->Category->save($this->request->data)){
                $this->Session->setFlash('This category is saved','success', array(), 'success');
                $this->redirect('add');
            }
        }
    }
} 