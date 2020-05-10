<?php
class Admin_model_workother extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function workother_insert($data)
	{
		return $this->db->insert('tb_workother',$data);
	}

	public function workother_update($data)
	{
		return $this->db->update('tb_workother',$data,"work_id='".$this->input->post('work_id')."'");
	}

	public function workother_delete($id)
	{
			$this->db->where('work_id', $id);
		return $this->db->delete('tb_workother');
	}

}