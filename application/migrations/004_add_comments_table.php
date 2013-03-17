<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_comments_table extends CI_Migration {

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
	        'comment' => array(
	          'type' => 'TEXT',
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
	    $this->dbforge->create_table('comments');
	}

	public function down() {
		$this->dbforge->drop_table('comments');	
	}

}

/* End of file 004_add_comments_table */
/* Location: ./application/migrations/004_add_comments_table */