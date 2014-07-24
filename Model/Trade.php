<?php
App::uses('AppModel', 'Model');

class Trade extends AppModel {

	public $validate = array(
		'order_id' => array(
            'unique' => array(
                'rule' => array('checkUnique', array('stock_id', 'order_id')),
                'message' => 'Este Item já faz parte do Movimento!',
            ),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'stock_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'buy_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'buy_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'sell_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'sell_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'done' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
		'canceled' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
	);

	public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'OrderType' => array(
            'className' => 'OrderType',
            'foreignKey' => '',
            'conditions' => array('Order.order_type_id = OrderType.id'),
            'fields' => '',
            'order' => ''
        ),
        'Stock' => array(
            'className' => 'Stock',
            'foreignKey' => 'stock_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'StockSituation' => array(
            'className' => 'StockSituation',
            'foreignKey' => 'stock_situation_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'StockGroup' => array(
            'className' => 'StockGroup',
            'foreignKey' => '',
            'conditions' => array('Stock.stock_group_id = StockGroup.id'),
            'fields' => '',
            'order' => ''
        ),
        'StockType' => array(
            'className' => 'StockType',
            'foreignKey' => '',
            'conditions' => array('Stock.stock_type_id = StockType.id'),
            'fields' => '',
            'order' => ''
        ),
        'StockUnit' => array(
            'className' => 'StockUnit',
            'foreignKey' => '',
            'conditions' => array('Stock.stock_unit_id = StockUnit.id'),
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
}
