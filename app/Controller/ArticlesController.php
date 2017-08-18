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
    public function admin_index() {
        $this->loadModel('Category');
        $categorys = $this->Category->find('list',array('fields'=>array('id','title')));
        $this->Article->recursive = -1;
        $this->Paginator->settings['Article']['limit'] = 20;
        $articles = $this->Paginator->paginate();
        $this->set(compact('articles','categorys'));
    }
    public function admin_edit($id) {
        if($this->request->is('post') || $this->request->is('put')){
            $this->Article->id = $id;
            if($this->Article->save($this->request->data)){
                $this->Session->setFlash('Data saved','success', array(), 'success');
            }else{
                $this->Session->setFlash('Có lỗi xảy ra.','error', array(), 'error');
            }
        }
        $this->loadModel('Category');
        $categorys = $this->Category->find('list',array('fields'=>array('id','title')));
        $article = $this->Article->findById($id);
        $this->request->data = $article;
        $this->set('categorys',$categorys);
    }
} 