<?php
App::uses('AppModel', 'Model');
class Article extends AppModel {
    public $validate = array(
        'slug' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A slug is required'
            )
        )
    );
    public $belongsTo = array(
        'Category'
    );

}