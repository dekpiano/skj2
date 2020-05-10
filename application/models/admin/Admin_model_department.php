<?php
class Admin_model_department extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function department_insert($data)
	{
		return $this->db->insert('tb_department',$data);
	}

	public function department_update($data)
	{
		return $this->db->update('tb_department',$data,"depart_id='".$this->input->post('depart_id')."'");
	}

	public function department_delete($id)
	{
			$this->db->where('depart_id', $id);
		return $this->db->delete('tb_department');
	}

}