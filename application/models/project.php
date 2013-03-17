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
			'created_by' => 'jakeCraige',//$this->session->userdata('username'),
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
		$query = $this->db->get('projects');
		return $query->result_array();
	}
}

/* End of file project.php */
/* Location: ./application/models/project.php */