<?php
App::uses('AppModel', 'Model');
class User extends AppModel {

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'broker' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
		'percent' => array(
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
	);

	public $hasMany = array(
		'UserRole' => array(
			'className' => 'UserRole',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
