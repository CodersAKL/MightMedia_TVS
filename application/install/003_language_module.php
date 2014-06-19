<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 2014-06-18
 * Time: 20:41
 * © 2014
 *
 * @property CI_DB_forge $dbforge
 */

class Migration_Language_module extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(
			array(
				'language_id'          => array(
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true
				),
				'language_code'       => array(
					'type'       => 'VARCHAR',
					'constraint' => '3',
				),
				'language_title'       => array(
					'type'       => 'VARCHAR',
					'constraint' => '100',
				),
				'language_position' => array(
					'type' => 'TEXT',
					'null' => true,
				),
			)
		);
		$this->dbforge->add_key( 'language_id', true );
		$this->dbforge->add_key( 'language_code' );

		$this->dbforge->create_table( 'language', true );
		$aData = array(
			array(
				'language_code' => 'lt',
				'language_title' => 'lithuanian',
				'language_position' => 1
			),
			array(
				'language_code' => 'en',
				'language_title' => 'english',
				'language_position' => 1
			),
			array(
				'language_code' => 'ru',
				'language_title' => 'russian',
				'language_position' => 1
			),
		);
		$this->db->insert_batch( 'language', $aData );
	}

	public function down()
	{
		$this->dbforge->drop_table( 'language' );
	}
}