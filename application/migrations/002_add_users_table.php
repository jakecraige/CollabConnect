<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_users_table extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field('id');
		$this->dbforge->add_key('id');
	    $this->dbforge->add_field(array(
	        'username' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '20',
	          'null' => FALSE,
	        ),
	        'email_address' => array( 
	          'type' => 'VARCHAR',
	          'constraint' => '75',
	          'null' => FALSE,
	        ),
	        'password' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '32',
	          'null' => TRUE,
	        ),
	        'skills' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '255',
	          'null' => TRUE,
	        ),
	        'about' => array(
	          'type' => 'TEXT',
	          'null' => TRUE,
	        ),
	        'website' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '75',
	          'null' => TRUE,
	        ),
	    ));
	    $this->dbforge->create_table('users');
	}

	public function down() {
		$this->dbforge->drop_table('users');	
	}

}

/* End of file 002_add_users_table.php */
/* Location: ./application/migrations/002_add_users_table.php */