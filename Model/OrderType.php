<?php
App::uses('AppModel', 'Model');
class OrderType extends AppModel {
	public $actsAs = array(		
		'AccessKit.Log'
		);
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
	);

	public $belongsTo = array(
		'SellerType' => array(
			'className' => 'OrganizationType',
			'foreignKey' => 'seller_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BuyerType' => array(
			'className' => 'OrganizationType',
			'foreignKey' => 'buyer_type_id',
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
        )
	);

	public $hasMany = array(
		'OrderDetail' => array(
			'className' => 'OrderDetail',
			'foreignKey' => 'order_type_id',
			'dependent' => false,
			'conditions' => array('OrderDetail.order_id is null'),
			'fields' => '',
			'order' => array('sort'=>'ASC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
