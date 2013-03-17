<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_project_members_table extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field('id');
		$this->dbforge->add_key('id');
	    $this->dbforge->add_field(array(
	        'project_id' => array(
	          'type' => 'INT',
	          'null' => FALSE,
	        ),
	        'user_id' => array( 
	          'type' => 'INT',
	          'null' => FALSE,
	        ),
	    ));
	    $this->dbforge->create_table('project_members');
	}

	public function down() {
		$this->dbforge->drop_table('project_members');	
	}

}

/* End of file 003_add_project_members_table */
/* Location: ./application/migrations/003_add_project_members_table */