<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Model {

	public function write($project_id)
	{
		$datetime = date('Y-m-d H:i:s');
		$data = array(
			'project_id' => $project_id,
			'user_id' => $this->user->get_id($this->session->userdata('username')),
			'comment' => $this->input->post('comment'),
			'created_at' => $datetime,
			'updated_at' => $datetime
		);
		$this->db->insert('comments', $data);
	}
	public function edit($comment_id)
	{

	}
	public function delete($comment_id)
	{

	}
	public function get_all($project_id)
	{
		$this->db->where('project_id', $project_id);
		$this->db->order_by('created_at', 'desc');
		$query = $this->db->get('comments');
		return $query->result_array();
	}
}

/* End of file comment.php */
/* Location: ./application/models/comment.php */