<?php
/**
 * CaptalistTypeFixture
 *
 */
class CaptalistTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 100),
		'code_name' => array('type' => 'string', 'null' => false, 'length' => 50),
		'code_mask' => array('type' => 'string', 'null' => false, 'length' => 30),
		'sort' => array('type' => 'integer', 'null' => false, 'default' => '1'),
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
			'code_name' => 'Lorem ipsum dolor sit amet',
			'code_mask' => 'Lorem ipsum dolor sit amet',
			'sort' => 1
		),
	);

}
