<?php
/**
 * CaptalistFixture
 *
 */
class CaptalistFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'captalist_type_id' => array('type' => 'integer', 'null' => false),
		'code' => array('type' => 'string', 'null' => false, 'length' => 30),
		'name' => array('type' => 'string', 'null' => false, 'length' => 200),
		'nickname' => array('type' => 'string', 'null' => false, 'length' => 100),
		'phone' => array('type' => 'string', 'null' => false, 'length' => 20),
		'email' => array('type' => 'string', 'null' => false, 'length' => 256),
		'address' => array('type' => 'string', 'null' => false, 'length' => 300),
		'image' => array('type' => 'string', 'null' => false, 'length' => 300),
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
			'captalist_type_id' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'nickname' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor ',
			'email' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet'
		),
	);

}
