<?php
/**
 * Created by PhpStorm.
 * User: Kudo
 * Date: 4/3/2017
 * Time: 9:49 PM
 */

class ArticlesController extends AppController {
    public function add(){
        $this->layout = 'default';
    }
    public function admin_add() {
        $this->layout = 'default';
        if ($this->request->is('post') || $this->request->is('put')){
            debug($this->request);die;
        }
    }
} 