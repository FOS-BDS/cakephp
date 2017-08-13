<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public function display() {
		
	}
	public function index(){
		$this->layout = 'layout_web';
        $this->loadModel('Menu');
        $this->loadModel('Category');
        $this->Menu->contain = array();
        $menus = $this->Menu->find('all',
            array(
                'conditions'=> array('Menu.published'=>1),
                'contain'=>array('Category'=>array('conditions'=>array('Category.published'=>true)))
            ));
        $this->set(compact('menus'));
	}
    public function phpinfo(){
         phpinfo();
    }
}
