<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller {

	public function view($username)
	{
		$data['user'] = $this->user->get_info($username);
		if($data['user'] == FALSE)
		{
			$data['errors'] = 'User does not exist.';
		}
				
		$data['title'] = 'Profile - CollabConnect';
		$data['content'] = 'profiles/view';
		$this->load->view('templates/default', $data);
	}

}

/* End of file profiles.php */
/* Location: ./application/controllers/profiles.php */