<?php
/**
 * StockFixture
 *
 */
class StockFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'stock_type_id' => array('type' => 'integer', 'null' => true),
		'stock_group_id' => array('type' => 'integer', 'null' => true),
		'code' => array('type' => 'integer', 'null' => true),
		'name' => array('type' => 'string', 'null' => true, 'length' => 100),
		'description' => array('type' => 'text', 'null' => false, 'length' => 1073741824),
		'stock_unit_id' => array('type' => 'integer', 'null' => true),
		'units' => array('type' => 'integer', 'null' => false, 'default' => '1'),
		'price' => array('type' => 'float', 'null' => false),
		'markup' => array('type' => 'float', 'null' => false),
		'stock_situation_id' => array('type' => 'integer', 'null' => true),
		'depreciation_date' => array('type' => 'datetime', 'null' => true),
		'buy_order_id' => array('type' => 'integer', 'null' => true),
		'organization_id' => array('type' => 'integer', 'null' => true),
		'reference_year' => array('type' => 'string', 'null' => true, 'length' => 4),
		'last_inventory' => array('type' => 'string', 'null' => true, 'length' => 4),
		'note' => array('type' => 'text', 'null' => true, 'length' => 1073741824),
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
			'stock_type_id' => 1,
			'stock_group_id' => 1,
			'code' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'stock_unit_id' => 1,
			'units' => 1,
			'price' => 1,
			'markup' => 1,
			'stock_situation_id' => 1,
			'depreciation_date' => '2014-04-12 19:01:51',
			'buy_order_id' => 1,
			'organization_id' => 1,
			'reference_year' => 'Lo',
			'last_inventory' => 'Lo',
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2014-04-12 19:01:51',
			'creator_id' => 1,
			'updated' => '2014-04-12 19:01:51',
			'updater_id' => 1
		),
	);

}
