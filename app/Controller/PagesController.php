<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	public function display() {
		
	}
	public function index(){
		$this->layout = 'layout_web';
        $this->loadModel('Menu');
        $this->loadModel('Category');
        $this->loadModel('Article');
        $this->Menu->contain = array();
        $menus = $this->Menu->find('all',
            array(
                'conditions'=> array('Menu.published'=>1),
                'contain'=>array('Category'=>array('conditions'=>array('Category.published'=>true)))
            ));
        $categories = $this->Category->find('all',
            array(
                'conditions'=> array('Category.published'=>1),
            ));
        $hot_article = $this->Article->find('first',array(
            'order' => array('view'=>'DESC'),
            'limit' => 1
        ));
        $new_article = $this->Article->find('first',array(
            'order' => array('created'=>'DESC'),
            'limit' => 1
        ));
        $this->set(compact('menus','hot_article','new_article','categories'));
	}
    public function phpinfo(){
         phpinfo();
    }
}
