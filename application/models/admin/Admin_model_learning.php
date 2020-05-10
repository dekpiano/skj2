<?php
class Admin_model_learning extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function learning_insert($data)
	{
		return $this->db->insert('tb_learning',$data);
	}

	public function learning_update($data)
	{
		return $this->db->update('tb_learning',$data,"lear_id='".$this->input->post('lear_id')."'");
	}

	public function learning_delete($id)
	{
			$this->db->where('lear_id', $id);
		return $this->db->delete('tb_learning');
	}

}