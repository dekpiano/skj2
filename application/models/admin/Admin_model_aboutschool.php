<?php
class Admin_model_aboutschool extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function aboutschool_insert($data)
	{
		return $this->db->insert('tb_aboutschool',$data);
	}

	public function aboutschool_update($data)
	{
		return $this->db->update('tb_aboutschool',$data,"about_id='".$this->input->post('about_id')."'");
	}

	public function aboutschool_delete($id)
	{
			$this->db->where('about_id', $id);
		return $this->db->delete('tb_aboutschool');
	}

}