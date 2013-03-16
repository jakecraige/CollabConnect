<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$data['title'] = 'About - CollabConnect';
		$data['content'] = 'about';
		$this->load->view('templates/default', $data);
	}

}

/* End of file about.php */
/* Location: ./application/controllers/about.php */