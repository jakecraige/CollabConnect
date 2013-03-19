<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller {

	public function view($username)
	{
		$this->load->helper('profile');
		
		$data['user'] = $this->user->get_info($username);
		if($data['user'] == FALSE)
		{
			$data['errors'] = 'User does not exist.';
		}
		$data['title'] = 'Profile - CollabConnect';
		$data['content'] = 'profiles/view';
		$this->load->view('templates/default', $data);
	}
	public function edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('about', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('website', 'fieldlabel', 'trim|required|min_length[10]|prep_url');

		if($this->form_validation->run() == FALSE)
		{
			$data['user'] = $this->user->get_info($this->session->userdata('username'));
			$data['title'] = 'Edit Profile - CollabConnect';
			$data['content'] = 'profiles/edit';
			$this->load->view('templates/default', $data);
		}
		else //form validation passed
		{
			if($this->user->update())
			{
				$this->session->set_flashdata('user_update', 'Updated User Profile!');
			}
			else
			{
				$this->session->set_flashdata('user_update_error', 'Error Updating User Profile!');
			}
			$username = $this->session->userdata('username');
			redirect("profiles/$username");
		}

		
	}
}

/* End of file profiles.php */
/* Location: ./application/controllers/profiles.php */