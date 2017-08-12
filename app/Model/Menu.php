<?php
App::uses('AppModel', 'Model');
class Menu extends AppModel {
    public $validate = array(
        'slug' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A slug is required'
            )
        )
    );
}