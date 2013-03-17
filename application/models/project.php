<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Model {
/*
	Table Structure(projects):
	id, summary, details, repo, skills, created by, created at, updated at
*/
	public function create()
	{
		$datetime = date('Y-m-d H:i:s');
		$skillset = '';
		$skills = $this->input->post('skills');
		if(!empty($skills))
		{
			foreach($skills as $skill)
			{
				$skillset .= " $skill";
			}
			$skillset = trim($skillset); //Get rid of initial space when creating list
		}

		$data = array(
			'summary' => $this->input->post('summary'),
			'details' => $this->input->post('details'),
			'repository' => $this->input->post('repository'),
			'skills' => $skillset,
			'status' => 'Open',
			'created_by' => $this->session->userdata('username'),
			'created_at' => $datetime,
			'updated_at' => $datetime,
		);
		$this->db->insert('projects', $data);
		return $this->db->insert_id();
	}
	public function get_info($project_id)
	{
		$this->db->where('id', $project_id);
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
		/*$this->db->select('*');
		$this->db->from('projects_members');
		$this->db->where('project_id', $project_id);
		$this->db->join('users', "5 = projects.id");*/
		/*$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}*/

	}
	public function get_project_members($project_id)
	{

	}
}

/* End of file project.php */
/* Location: ./application/models/project.php */