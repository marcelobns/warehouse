<?php
/**
 * UserRoleFixture
 *
 */
class UserRoleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false),
		'module_id' => array('type' => 'integer', 'null' => false),
		'role_id' => array('type' => 'integer', 'null' => false),
		'last_signin' => array('type' => 'datetime', 'null' => true),
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
			'user_id' => 1,
			'module_id' => 1,
			'role_id' => 1,
			'last_signin' => '2014-04-12 19:01:52'
		),
	);

}
