<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Projects - CollabConnect';
		$data['content'] = 'projects/all_projects';
		$this->load->view('templates/default', $data);
	}
	public function me()
	{
		$data['title'] = 'My Projects - CollabConnect';
		$data['content'] = 'projects/my_projects';
		$this->load->view('templates/default', $data);
	}
	public function create()
	{
		$this->load->helper('form');
		$data['title'] = 'Create Project - CollabConnect';
		$data['content'] = 'projects/create_project';
		$this->load->view('templates/default', $data);
	}
	public function view($project)
	{

	}
}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */