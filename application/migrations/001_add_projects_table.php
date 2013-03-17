<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_projects_table extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field('id');
		$this->dbforge->add_key('id');
	    $this->dbforge->add_field(array(
	        'summary' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '255',
	          'null' => FALSE,
	        ),
	        'details' => array(
	          'type' => 'TEXT',
	          'null' => FALSE,
	        ),
	        'repository' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '100',
	          'null' => TRUE,
	        ),
	        'skills' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '255',
	          'null' => TRUE,
	        ),
	        'status' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '20',
	          'null' => TRUE,
	        ),
	        'created_by' => array(
	          'type' => 'VARCHAR',
	          'constraint' => '20',
	          'null' => TRUE,
	        ),
	        'created_at' => array(
	          'type' => 'DATETIME',
	          'null' => TRUE,
	        ),
	        'updated_at' => array(
	          'type' => 'DATETIME',
	          'null' => TRUE,
	        ),
	    ));
	    $this->dbforge->create_table('projects');
	}

	public function down() {
		$this->dbforge->drop_table('projects');
	}

}

/* End of file 001_add_projects_table.php */
/* Location: ./application/migrations/001_add_projects_table.php */