<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function create()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'email_address' => $this->input->post('email_address'),
			'password' => md5($this->input->post('password')),
		);
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}
	public function get_info($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function get_all()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function validate()
	{
		$data = array(
			'username' => trim($this->input->post('username')),
			'password' => trim(md5($this->input->post('password'))),
		);
		$query = $this->db->get_where('users', $data);
		if($query->num_rows() > 0)
		{
			$data = array(
                   'username'  => $this->input->post('name'),
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function logged_in()
	{

	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */