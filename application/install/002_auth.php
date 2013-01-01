<?php
class Migration_Auth extends CI_Migration {

	public function up()
	{
		$aFields = array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => true,
				'auto_increment' => true
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => false
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true
			)
		);

		$this->dbforge->add_field( $aFields );
		$this->dbforge->add_key( 'id', true );
		$this->dbforge->create_table( 'groups', true );

		$aData = array(
			array(
				'name' => 'admin',
				'description' => 'Administrator'
			),
			array(
				'name' => 'members',
				'description' => 'General User'
			)
		);
		$this->db->insert_batch( 'groups', $aData );

		$aFields = array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => true,
				'auto_increment' => true
			),
			'ip_address' => array(
				'type' => 'VARBINARY',
				'constraint' => '16',
				'null' => false
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '80',
				'null' => false
			),
			'salt' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => true
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			),
			'activation_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => true
			),
			'forgotten_password_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => null
			),
			'forgotten_password_time' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => true,
				'null' => true
			),
			'remember_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => true
			),
			'created_on' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => false
			),
			'last_login' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => true
			),
			'active' => array(
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => true
			),
			'first_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => true
			),
			'last_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => true
			),
			'company' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true
			)
		);

		$this->dbforge->add_field( $aFields );
		$this->dbforge->add_key( 'id', true );
		$this->dbforge->create_table( 'users', true );

		$aData = array(
			'ip_address' => '0x7f000001',
			'username'   => 'administrator',
			'password'   => '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4',
			'salt'       => '9462e8eee0',
			'email'      => 'admin@admin.com',
			'created_on' => '1268889823',
			'last_login' => '1268889823',
			'active'     => '1',
			'first_name' => 'Admin',
			'last_name'  => 'Administrator'
		);

		$this->db->insert( 'users', $aData );

		// users_groups
		$aFields = array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => true,
				'auto_increment' => true
			),
			'user_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'null' => false
			),
			'group_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'null' => false
			)
		);

		$this->dbforge->add_field( $aFields );
		$this->dbforge->add_key( 'id', true );
		$this->dbforge->create_table( 'users_groups', true );

		$aData = array(
			array(
				'user_id' => 1,
				'group_id' => 1
			),
			array(
				'user_id' => 1,
				'group_id' => 2
			)
		);

		$this->db->insert_batch( 'users_groups', $aData );

		// login_attempts
		$aFields = array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => true,
				'auto_increment' => true
			),
			'ip_address' => array(
				'type' => 'VARBINARY',
				'constraint' => '11',
				'null' => false
			),
			'login' => array(
				'type' => 'varchar',
				'constraint' => '100',
				'null' => false
			),
			'time' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => true,
				'null' => true
			)
		);

		$this->dbforge->add_field( $aFields );
		$this->dbforge->add_key( 'id', true );
		$this->dbforge->create_table( 'login_attempts', true );

	}

	public function down()
	{
		$this->dbforge->drop_table('groups');
		$this->dbforge->drop_table('users');
		$this->dbforge->drop_table('users_groups');
		$this->dbforge->drop_table('login_attempts');
	}

}
