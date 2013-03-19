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
	public function get_info($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	public function get_id($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		foreach($query->result() as $row)
		{
			return $row->id;
		}
		return FALSE;
	}
	public function get_username($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		foreach($query->result() as $row)
		{
			return $row->username;
		}
		return FALSE;
	}
	public function get_email_address($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		foreach($query->result() as $row)
		{
			return $row->email_address;
		}
		return FALSE;
	}
	public function get_email_address_from_id($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		foreach($query->result() as $row)
		{
			return $row->email_address;
		}
		return FALSE;
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
			'password' => trim(md5($this->input->post('password')))
		);
		$query = $this->db->get_where('users', $data);
		if($query->num_rows() > 0)
		{
			$username = trim($this->input->post('username'));
			$login = array(
                   'username'  => $username,
                   'logged_in' => TRUE,
                   'user_id' => $this->user->get_id($username),
                   'email_address' => $this->user->get_email_address($username)
               );
			$this->session->set_userdata($login);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function logged_in()
	{
		if($this->session->userdata('username') != FALSE
				&& $this->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update()
	{
		$this->load->helper('profile');
		$data = array(
			'about' => $this->input->post('about'),
			'website' => $this->input->post('website'),
			'skills' => skills_to_list($this->input->post('skills'))
		);
		$this->db->where('username', $this->session->userdata('username'));
		if($this->db->update('users', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */