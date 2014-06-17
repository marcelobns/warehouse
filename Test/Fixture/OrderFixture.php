<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'datetime' => array('type' => 'datetime', 'null' => false),
		'order_type_id' => array('type' => 'integer', 'null' => false),
		'seller_id' => array('type' => 'integer', 'null' => true),
		'buyer_id' => array('type' => 'integer', 'null' => false),
		'payment_type_id' => array('type' => 'integer', 'null' => true),
		'broker_id' => array('type' => 'integer', 'null' => true),
		'done' => array('type' => 'boolean', 'null' => false, 'default' => false),
		'note' => array('type' => 'string', 'null' => true, 'length' => 300),
		'year' => array('type' => 'string', 'null' => true, 'length' => 4),
		'num' => array('type' => 'integer', 'null' => true),
		'reference_id' => array('type' => 'integer', 'null' => true),
		'canceled' => array('type' => 'boolean', 'null' => true, 'default' => false),
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
			'datetime' => '2014-04-12 19:01:47',
			'order_type_id' => 1,
			'seller_id' => 1,
			'buyer_id' => 1,
			'payment_type_id' => 1,
			'broker_id' => 1,
			'done' => 1,
			'note' => 'Lorem ipsum dolor sit amet',
			'year' => 'Lo',
			'num' => 1,
			'reference_id' => 1,
			'canceled' => 1,
			'canceled_note' => 'Lorem ipsum dolor sit amet',
			'canceled_auth_id' => 1,
			'created' => '2014-04-12 19:01:47',
			'creator_id' => 1,
			'updated' => '2014-04-12 19:01:47',
			'updater_id' => 1
		),
	);

}
