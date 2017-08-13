<?php
App::uses('AppModel', 'Model');
class Category extends AppModel {
    public $belongsTo = array(
        'Menu' => array(
            'className' => 'Menu',
        )
    );
}