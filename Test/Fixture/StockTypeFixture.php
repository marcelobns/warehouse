<?php
/**
 * StockTypeFixture
 *
 */
class StockTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 200),
		'avg_markup' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'depreciation' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'consumer_goods' => array('type' => 'boolean', 'null' => false, 'default' => false),
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
			'avg_markup' => 1,
			'depreciation' => 1,
			'consumer_goods' => 1
		),
	);

}
