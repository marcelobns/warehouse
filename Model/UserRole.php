<?php
App::uses('AppModel', 'Model');
class UserRole extends AppModel {

	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'module_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'role_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Module' => array(
			'className' => 'Module',
			'foreignKey' => 'module_id',
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
        'OrganizationScope' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_scope_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

//    public $hasMany = array(
//        'Log' => array(
//            'className' => 'Log',
//            'foreignKey' => 'oid',
//            'dependent' => false,
//            'conditions' => array(
//                'Log.alias = \'UserRole\''
//            ),
//            'fields' => '',
//            'order' => array('Log.date_time'=>'DESC'),
//            'limit' => '',
//            'offset' => '',
//            'exclusive' => '',
//            'finderQuery' => '',
//            'counterQuery' => ''
//        )
//    );
}
