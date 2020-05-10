<?php
class Admin_model_adminmenu extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function adminmenu_insert($data)
	{
		return $this->db->insert('tb_adminmenu',$data);
	}

	public function adminmenu_update($data)
	{
		return $this->db->update('tb_adminmenu',$data,"Amenu_id='".$this->input->post('Amenu_id')."'");
	}

	public function adminmenu_delete($id)
	{
			$this->db->where('Amenu_id', $id);
		return $this->db->delete('tb_adminmenu');
	}

}