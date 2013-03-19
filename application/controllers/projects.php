<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function index()
	{
		$this->load->model('project');
		$this->load->helper('date');

		$data['projects'] = $this->project->get_all();
		$data['title'] = 'Projects - CollabConnect';
		$data['content'] = 'projects/all_projects';
		$this->load->view('templates/default', $data);
	}
	public function me()
	{
		$this->load->model('project');
		$this->load->helper('date');


		$data['projects'] = $this->project->get_projects($this->session->userdata('user_id'));
		$data['title'] = 'My Projects - CollabConnect';
		$data['content'] = 'projects/my_projects';
		$this->load->view('templates/default', $data);
	}
	public function create()
	{
		if($this->user->logged_in())
		{
			$this->load->library('form_validation');
			$this->load->model('project');

			//Form validation rules
			$this->form_validation->set_rules('summary', 'Summary', 'trim|required|min_length[10]|is_unique[projects.summary]');
			$this->form_validation->set_rules('details', 'Details', 'trim|required|is_unique[projects.repository]');
			$this->form_validation->set_rules('repository', 'Repository', 'trim|min_length[10]|prep_url');


			if($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Create Project - CollabConnect';
				$data['errors'] = '';
				$data['content'] = 'projects/create_project';
				$this->load->view('templates/default', $data);
			}
			else
			{
				$data['id'] = $this->project->create();
				$data['title'] = 'Success! - CollabConnect';
				$data['errors'] = '';
				$data['content'] = 'projects/created_success';
				$this->load->view('templates/default', $data);
			}
		}
		else
		{
			$this->session->set_flashdata('messages', 'You must login to post a new project.');
			redirect('login');
		}
	}

	public function view($project_id)
	{
		$this->load->model('project');
		$this->load->model('comment');
		$this->load->helper('date');
		$this->load->helper('profile'); //for gravar img in comment

		$data['username'] = $this->session->userdata('username');
		$data['user_email_address'] = $this->session->userdata('email_address');
		$data['comments'] = $this->comment->get_all($project_id);
		$data['project'] = $this->project->get_info($project_id); //array of poject info

		$data['title'] = 'View - CollabConnect';
		$data['content'] = 'projects/view';
		$this->load->view('templates/default', $data);
	}
	public function join($project_id)
	{
		$this->load->model('project');
		$this->project->join($project_id);
		redirect("projects/view/$project_id");
	}
	public function leave($project_id)
	{
		$this->load->model('project');
		$this->project->leave($project_id);
		redirect("projects/view/$project_id");
	}
	public function comment($project_id)
	{
		$this->load->model('comment');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('comment', 'Comment', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			//$this->session->set_flashdata('write_comment', 'Left  successfully');
			redirect("projects/view/$project_id");
		}
		else
		{
			$this->comment->write($project_id);
			// $this->session->set_flashdata('new_comment', 'Comment Added!');
			redirect("projects/view/$project_id");
		}
	}
	public function delete_comment($comment_id)
	{
		$this->load->model('comment');
		if($this->comment->delete($comment_id))
		{
			$this->session->set_flashdata('delete_comment', 'Comment Deleted!');
			redirect('projects/');
		}
		else
		{
			$this->session->set_flashdata('delete_comment', 'Error deleting comment!');
			redirect('projects/');
		}
	}
}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */