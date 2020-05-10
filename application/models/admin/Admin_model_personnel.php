<?php
class Admin_model_personnel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function personnel_insert($data)
	{
		return $this->db->insert('tb_personnel',$data);
	}

	public function personnel_update($data)
	{
		return $this->db->update('tb_personnel',$data,"pers_id='".$this->input->post('pers_id')."'");
	}

	public function personnel_delete($id)
	{
				$this->db->where('pers_id', $id);
		return 	$this->db->delete('tb_personnel');
	}

}