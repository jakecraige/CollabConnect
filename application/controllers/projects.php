<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Projects - CollabConnect';
		$data['content'] = 'projects';
		$this->load->view('templates/default', $data);
	}

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */