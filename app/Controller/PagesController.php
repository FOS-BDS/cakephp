<?php
App::uses('AppController', 'Controller');
App::import('Lib', 'Redise');

class PagesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','redis');
    }
	public function display() {
		
	}
	public function index(){
		$this->layout = 'layout_web';
        $this->loadModel('Menu');
        $this->loadModel('Category');
        $this->loadModel('Article');
        $this->Menu->contain = array();
        $categories = $this->Category->find('all',
            array(
                'conditions'=> array('Category.published'=>1),
            ));
        $tech_article = $this->Article->find('all',array(
            'conditions'=>array('Category.slug' => 'cong-nghe'),
            'order' => array('view'=>'DESC'),
            'limit' => 5
        ));
        $medicine_articles = $this->Article->find('all',array(
            'conditions'=>array('Category.slug' => 'bai-thuoc'),
            'order' => array('view'=>'DESC'),
            'limit' => 5
        ));
        $new_article = $this->Article->find('first',array(
            'order' => array('Article.created'=>'DESC'),
            'limit' => 1
        ));
        $this->set(compact('menus','new_article','categories','tech_article','medicine_articles'));
	}
    public function phpinfo(){
         echo phpinfo();
        die;
    }
    public function redis(){
        $key = 'sms';
        require_once(APP.'Lib/Redis.php');
        $redis = new App\Lib\Redis();
//            $tmp = array(
//                'address' => 11,
//                'params'  => 2,
//                'sms'     => 12
//            );
//        $redis::rPush($key, $tmp, 'queue');
        $redis::rPush('default',array(
            'model' => 'NotificationRead',
            'data' => array(
                'id'        => 1,
                'model'      => 'test',
                'created'   => date('Y-m-d H:i:s')
            )
        ),'queue');
    }
}
