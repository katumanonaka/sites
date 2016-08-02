<?php
class AddCatId extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_cat_id';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'sites' => array(
					'cat_id1' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'after' => 'review'),
					'cat_id2' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'after' => 'cat_id1'),
					'cat_id3' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'after' => 'cat_id2'),
					'cat_id4' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'after' => 'cat_id3'),
					'cat_id5' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'after' => 'cat_id4'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'sites' => array('cat_id1', 'cat_id2', 'cat_id3', 'cat_id4', 'cat_id5'),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
