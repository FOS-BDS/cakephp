<?php
App::uses('AppModel', 'Model');
class Category extends AppModel {
    public $hasMany = array( 'Menu' => array(
        'className' => 'Menu',
    ));
}