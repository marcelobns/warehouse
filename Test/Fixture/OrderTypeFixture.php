<?php
/**
 * OrderTypeFixture
 *
 */
class OrderTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 100),
		'consumer_goods' => array('type' => 'boolean', 'null' => true, 'default' => false),
		'seller_type_id' => array('type' => 'integer', 'null' => true),
		'buyer_type_id' => array('type' => 'integer', 'null' => true),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'consumer_goods' => 1,
			'seller_type_id' => 1,
			'buyer_type_id' => 1
		),
	);

}
