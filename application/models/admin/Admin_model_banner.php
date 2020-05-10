<?php
class Admin_model_banner extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function banner_insert($data)
	{
		return $this->db->insert('tb_banner',$data);
	}

	public function banner_update($data)
	{
		return $this->db->update('tb_banner',$data,"banner_id='".$this->input->post('banner_id')."'");
	}

	public function banner_delete($id)
	{
				$this->db->where('banner_id', $id);
		return 	$this->db->delete('tb_banner');
	}

}