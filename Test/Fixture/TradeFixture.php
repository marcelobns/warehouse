<?php
/**
 * TradeFixture
 *
 */
class TradeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false),
		'stock_id' => array('type' => 'integer', 'null' => false),
		'buy_amount' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'buy_price' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'sell_amount' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'sell_price' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'stock_situation_id' => array('type' => 'integer', 'null' => true),
		'organization_id' => array('type' => 'integer', 'null' => true),
		'done' => array('type' => 'boolean', 'null' => false, 'default' => false),
		'note' => array('type' => 'text', 'null' => true, 'length' => 1073741824),
		'canceled' => array('type' => 'boolean', 'null' => false, 'default' => false),
		'canceled_note' => array('type' => 'string', 'null' => true, 'length' => 200),
		'canceled_auth_id' => array('type' => 'integer', 'null' => true),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => 'now()'),
		'creator_id' => array('type' => 'integer', 'null' => true),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => 'now()'),
		'updater_id' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'order_id' => 1,
			'stock_id' => 1,
			'buy_amount' => 1,
			'buy_price' => 1,
			'sell_amount' => 1,
			'sell_price' => 1,
			'stock_situation_id' => 1,
			'organization_id' => 1,
			'done' => 1,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'canceled' => 1,
			'canceled_note' => 'Lorem ipsum dolor sit amet',
			'canceled_auth_id' => 1,
			'created' => '2014-04-12 19:01:51',
			'creator_id' => 1,
			'updated' => '2014-04-12 19:01:51',
			'updater_id' => 1
		),
	);

}
