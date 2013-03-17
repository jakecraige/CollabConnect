<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function session()
	{
		echo 'ession';
		echo print_r($this->session->all_userdata());
	}
	public function logged_in()
	{
		echo $this->user->logged_in();
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */