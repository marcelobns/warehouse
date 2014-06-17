<?php
App::uses('AppModel', 'Model');
/**
 * Stock Model
 *
 * @property StockType $StockType
 * @property StockGroup $StockGroup
 * @property StockUnit $StockUnit
 * @property StockSituation $StockSituation
 * @property BuyOrder $BuyOrder
 * @property Organization $Organization
 * @property Creator $Creator
 * @property Updater $Updater
 * @property StockRate $StockRate
 * @property Trade $Trade
 */
class Stock extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'num' => array(
            'unique' => array(
                'rule' => array('checkUnique', array('stock_group_id', 'num')),
                'message' => '',
            )
        ),
        'stock_type_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'units' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	public $belongsTo = array(
		'StockType' => array(
			'className' => 'StockType',
			'foreignKey' => 'stock_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StockGroup' => array(
			'className' => 'StockGroup',
			'foreignKey' => 'stock_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StockUnit' => array(
			'className' => 'StockUnit',
			'foreignKey' => 'stock_unit_id',
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
//		'BuyOrder' => array(
//			'className' => 'Order',
//			'foreignKey' => 'buy_order_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
//		'Organization' => array(
//			'className' => 'Organization',
//			'foreignKey' => 'organization_id',
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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'StockRate' => array(
			'className' => 'StockRate',
			'foreignKey' => 'stock_id',
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
		'Trade' => array(
			'className' => 'Trade',
			'foreignKey' => 'stock_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('Trade.id'=>'DESC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    function getStockList($module_id = null) {
        $stocks = $this->find('all', array(
            'recursive'=>-1,
            'fields'=>array(
                'Stock.id',
                'Stock.description',
                'CASE WHEN sum(Trade.buy_amount) is null THEN 0 ELSE (sum(Trade.buy_amount) - sum(Trade.sell_amount)) END as "Stock__balance"'
            ),
            'joins'=>array(
                array(
                    'table' => 'stock_types',
                    'alias' => 'StockType',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'StockType.id = Stock.stock_type_id'
                    )
                ),
                array(
                    'table' => 'trades',
                    'alias' => 'Trade',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Stock.id = Trade.stock_id',
                        'Trade.canceled = false'
                    )
                ),
            ),
            'conditions'=>array(
                'StockType.module_id'=>$module_id,
                'Stock.updated > \'2014-01-01\'',
                'Stock.enabled'
            ),
            'group'=>array('Stock.id', 'Stock.description'),
            'order'=>array('Stock.description'=>'ASC')
        ));
        return Set::combine($stocks, '{n}.Stock.id', array('{0} | {1} | {2}', '{n}.Stock.id', '{n}.Stock.description', '{n}.Stock.balance'));
    }
}
