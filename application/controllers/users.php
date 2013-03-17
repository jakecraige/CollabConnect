<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->login();
	}
	public function login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Login - CollabConnect';
			$data['content'] = 'auth/login';
			$this->load->view('templates/default', $data);
		}
		else
		{
			if($this->user->validate())
			{
				$this->session->set_flashdata('messages', 'Signed in!');
				redirect(base_url());
			}
			else
			{
				$data['errors'] = 'Username or Password do not match.';
				$data['title'] = 'Login - CollabConnect';
				$data['content'] = 'auth/login';
				$this->load->view('templates/default', $data);
			}
		}
	}
	public function register()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Form validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|is_unique[users.username]');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|is_unique[users.email_address]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[32]|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Register - CollabConnect';
			$data['content'] = 'auth/register';
			$this->load->view('templates/default', $data);
		}
		else
		{
			$data['id'] = $this->user->create();
			$data['title'] = 'Success! - CollabConnect';
			$data['errors'] = '';
			$data['content'] = 'auth/registration_success';
			$this->load->view('templates/default', $data);
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$data['title'] = 'Logout - CollabConnect';
		$data['content'] = 'auth/logout';
		$this->load->view('templates/default', $data);
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */