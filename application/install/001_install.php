<?php
class Migration_Install extends CI_Migration {

	public function up()
	{
		$fields = array(
			'session_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '32',
			),
			'user_agent' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true,
			),
			'last_activity' => array(
				'type' => 'INT',
				'constraint' => '12',
				'null' => true,
			),
			'user_data' => array(
				'type' => 'TEXT',
			),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('session_id', TRUE);
		$this->dbforge->create_table('ci_sessions', true);

		// Blog
		$this->dbforge->add_field(array(
				'blog_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'blog_title' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'blog_description' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
			));

		$this->dbforge->add_key('blog_id', true);
		$this->dbforge->create_table('blog', true);

	}


	public function down()
	{
		$this->dbforge->drop_table('ci_sessions');
		$this->dbforge->drop_table('blog');
	}

}
