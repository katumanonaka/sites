<?php
App::uses('CategoryName', 'Model');

/**
 * CategoryName Test Case
 */
class CategoryNameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.category_name'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoryName = ClassRegistry::init('CategoryName');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoryName);

		parent::tearDown();
	}

}
