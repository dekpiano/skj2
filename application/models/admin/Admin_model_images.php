<?php
class Admin_model_images extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function images_insert($data)
	{
		return $this->db->insert('tb_images',$data);
	}

	public function images_update($data)
	{
		return $this->db->update('tb_images',$data,"img_id='".$this->input->post('img_id')."'");
	}

	public function images_delete($id)
	{
			$this->db->where('img_id', $id);
		return $this->db->delete('tb_images');
	}

}