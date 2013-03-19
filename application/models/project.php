<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Model {
/*
	Table Structure(projects):
	id, summary, details, repo, skills, created by, created at, updated at
*/
	public function create()
	{
		$this->load->helper(array('profile', 'date'));

		$data = array(
			'summary' => $this->input->post('summary'),
			'details' => $this->input->post('details'),
			'repository' => $this->input->post('repository'),
			'skills' => skills_to_list($this->input->post('skills')),
			'status' => 'Open',
			'created_by' => $this->session->userdata('username'),
			'created_at' => current_datetime(),
			'updated_at' => current_datetime(),
		);
		$this->db->insert('projects', $data);

		//get project id so we can show a link to redirect user back to project
		$project_id = $this->db->insert_id();

		return $project_id;
	}
	public function get_info($project_id)
	{
		$this->db->where('id', $project_id);
		$query = $this->db->get('projects');
		return $query->result_array();
	}
	public function get_projects($user_id)
	{
		$query = $this->db->query("SELECT *
					FROM users, project_members
					WHERE users.id = project_members.user_id");
		$projects = array();
		foreach($query->result() as $row)
		{
			if($row->user_id == $user_id)
			{
				$projects[] = $row->project_id;
			}
		}

		$this->db->where('status <>', 'Closed');
		$this->db->where('id', $projects[0]); //Done to always have the first AND query
		foreach ($projects as $project)
		{
			$this->db->or_where('id', $project);
		}
		$this->db->order_by('created_at', 'desc');

		$query = $this->db->get('projects');
		return $query->result_array();
	}
	public function get_all()
	{
		$this->db->where('status <>', 'Closed');
		$this->db->order_by('created_at', 'desc');
		$query = $this->db->get('projects');
		return $query->result_array();
	}
	public function join($project_id)
	{
		$user = $this->user->get_info($this->session->userdata('username'));
		$data = array(
			'user_id' => $user[0]['id'],
			'project_id' => $project_id
		);
		$this->db->insert('project_members', $data);
	}
	public function leave($project_id)
	{
		$user = $this->user->get_info($this->session->userdata('username'));

		$this->db->where('user_id', $user[0]['id']);
		$this->db->where('project_id', $project_id);
		$this->db->delete('project_members');
	}
	public function is_member($project_id)
	{
		$user = $this->user->get_info($this->session->userdata('username'));
		$user_id = $user[0]['id'];
		$query = $this->db->query("SELECT *
					FROM users, project_members
					WHERE users.id = project_members.user_id");
		foreach($query->result() as $row)
		{
			if($row->user_id == $user_id
					&& $row->project_id == $project_id)
			{
				return TRUE;
			}
		}
		return FALSE;
	}
	public function get_members($project_id)
	{
		$query = $this->db->query("SELECT *
					FROM users, project_members
					WHERE users.id = project_members.user_id");
		$users = array();
		foreach($query->result() as $row)
		{
			if($row->project_id == $project_id)
			{
				$user = $this->user->get_username($row->user_id);
				$users[] = $user;
			}
		}
		if(!empty($users))
		{
			return $users;
		}
		else
		{
			return FALSE;
		}
	}
}

/* End of file project.php */
/* Location: ./application/models/project.php */