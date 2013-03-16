<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sites extends CI_Controller {

	public function index()
	{
		$this->addNums();
	}	
	public function hello()
	{
		echo 'Hello!';
	}
	public function addNums()
	{
		$this->load->model('math');
		echo $this->math->add();
	}
}