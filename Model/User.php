<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
	public $actsAs = array(
		'SearchKit.Searchable',
		'AccessKit.Requester'=>array(
            'Group'=>'Role',
            'GroupKey'=>'role_id'
			),
		'AccessKit.Log'
		);

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
        'username' => array(
            'isUnique'  => array(
                'rule'=>'isUnique',
                'message' => 'This username has already been taken.'
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'organization_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	public $belongsTo = array(
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	public $hasMany = array(
		'Module' => array(
			'className' => 'Module',
			'foreignKey' => false,
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

}
