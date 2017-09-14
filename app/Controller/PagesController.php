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
    public function subscribeClientId()
    {
        $this->autoRender = false;
        $this->loadModel('ChromeClient');
        $this->loadModel('Websites');
        $websiteUrl = $this->request->data['websiteUrl'];
        $websiteUrl = explode('/',$websiteUrl);
        $websiteName = $websiteUrl[2];
        //using if for localhost if it has a port
        $websiteName = explode(':',$websiteName);
        $website = $this->Websites->find('first',
            array(
                'conditions' => array(
                    'url' => $websiteName[0]
                )
            )
        );
        $exist = $this->ChromeClient->find('first',
            array(
                'conditions' => array(
                    'registration_id' => $this->request->data['clientId']
                )
            ));

        $insertData = array(
            'ChromeClient' => array(
                'registration_id' => $this->request->data['clientId'],
                'website_id' => $website['Websites']['id'],
                'created' => date('Y-m-d H:i:s')
            )
        );

        if(!empty($exist)) {
            $this->ChromeClient->id = $exist['ChromeClient']['id'];
        } else {
            $this->ChromeClient->create();
            $redis = new RedisQueue('default','chrome-notify-'.$website['Websites']['id']);
            $redis->rPush($insertData['ChromeClient']['registration_id']);
        }

        try{
            $this->ChromeClient->save($insertData);
        } catch(Exception $e) {
            CakeLog::info('Error when subcribe id '.$e->getMessage());
        }
    }
}
