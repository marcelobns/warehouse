<?php
App::uses('AppModel', 'Model');
class Order extends AppModel {
	public $actsAs = array(
		'SearchKit.Searchable',
		'AccessKit.Log'
		);

	public $validate = array(
		'order_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
        'seller_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
		'buyer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'done' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
	);

	public $belongsTo = array(
		'OrderType' => array(
			'className' => 'OrderType',
			'foreignKey' => 'order_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Seller' => array(
			'className' => 'Organization',
			'foreignKey' => 'seller_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Buyer' => array(
			'className' => 'Organization',
			'foreignKey' => 'buyer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	public $hasMany = array(
		'OrderDetail' => array(
			'className' => 'OrderDetail',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('sort'=>'ASC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			'searchable'=> array(
					'table' => 'order_details',
					'alias' => 'OrderDetail',
					'type' => 'LEFT',
					'conditions' => array(
						'OrderDetail.order_id = Order.id',
					)
				)
		),
		'Trade' => array(
			'className' => 'Trade',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		),
        'Log' => array(
            'className' => 'Log',
            'foreignKey' => 'oid',
            'dependent' => false,
            'conditions' => array(
                'Log.alias = \'Order\''
            ),
            'fields' => '',
            'order' => array('Log.date_time'=>'DESC'),
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
	);
}
