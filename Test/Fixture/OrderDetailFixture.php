<?php
/**
 * OrderDetailFixture
 *
 */
class OrderDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => true),
		'name' => array('type' => 'string', 'null' => false, 'length' => 64),
		'value' => array('type' => 'string', 'null' => true, 'length' => 256),
		'order_type_id' => array('type' => 'integer', 'null' => true),
		'input_type' => array('type' => 'string', 'null' => true, 'default' => 'text', 'length' => 64),
		'input_mask' => array('type' => 'string', 'null' => true, 'length' => 64),
		'required' => array('type' => 'boolean', 'null' => true, 'default' => false),
		'css_class' => array('type' => 'string', 'null' => true, 'default' => 'none', 'length' => 20),
		'sort' => array('type' => 'integer', 'null' => true, 'default' => '1'),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'order_type_id' => 1,
			'input_type' => 'Lorem ipsum dolor sit amet',
			'input_mask' => 'Lorem ipsum dolor sit amet',
			'required' => 1,
			'css_class' => 'Lorem ipsum dolor ',
			'sort' => 1
		),
	);

}
