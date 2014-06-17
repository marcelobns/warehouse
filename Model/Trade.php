<?php
App::uses('AppModel', 'Model');
/**
 * Trade Model
 *
 * @property Order $Order
 * @property Stock $Stock
 * @property StockSituation $StockSituation
 * @property Organization $Organization
 * @property CanceledAuth $CanceledAuth
 * @property Creator $Creator
 * @property Updater $Updater
 */
class Trade extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'buy_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'buy_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sell_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sell_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'done' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'canceled' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
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
		'Buyer' => array(
			'className' => 'Organization',
			'foreignKey' => 'buyer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
//		'CanceledAuth' => array(
//			'className' => 'User',
//			'foreignKey' => 'canceled_auth_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
//		'Creator' => array(
//			'className' => 'User',
//			'foreignKey' => 'creator_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
//		'Updater' => array(
//			'className' => 'User',
//			'foreignKey' => 'updater_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
	);
}
