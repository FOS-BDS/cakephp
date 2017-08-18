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
    public function admin_menu_index() {
        $this->loadModel('Menu');
        $this->Menu->recursive = -1;
        $this->Paginator->settings['Menu']['limit'] = 20;
        $menus = $this->Paginator->paginate();
        $this->set('menus',$menus);
    }
    public function admin_index() {
        $this->Category->recursive = -1;
        $this->Paginator->settings['Category']['limit'] = 20;
        $categories = $this->Paginator->paginate();
        $this->set('categories',$categories);
    }
    public function admin_edit($id) {
        if($this->request->is('post') || $this->request->is('put')){
            $this->Category->id = $id;
            if($this->Category->save($this->request->data)){
                $this->Session->setFlash('Data saved','success', array(), 'success');
            }else{
                $this->Session->setFlash('Có lỗi xảy ra.','error', array(), 'error');
            }
        }
        $this->loadModel('Menu');
        $menus = $this->Menu->find('list',array('fields'=>array('id','title')));
        $Category = $this->Category->findById($id);
        $this->request->data = $Category;
        $this->set('menus',$menus);
    }
    public function admin_delete($id) {
        $this->Category->delete($id);
        $this->Session->setFlash('Delete successful.','success', array(), 'success');
        $this->redirect(array('controller'=>'categories','action'=>'index'));
    }
    public function admin_edit_menu($id) {
        $this->loadModel('Menu');
        if($this->request->is('post') || $this->request->is('put')){
            $this->Menu->id = $id;
            if($this->Menu->save($this->request->data)){
                $this->Session->setFlash('Data saved','success', array(), 'success');
            }else{
                $this->Session->setFlash('Có lỗi xảy ra.','error', array(), 'error');
            }
        }
        $menu = $this->Menu->findById($id);
        $this->request->data = $menu;
    }
    public function admin_delete_menu() {

    }
    public function index($slug) {
        $this->layout = 'layout_web';
    }
} 