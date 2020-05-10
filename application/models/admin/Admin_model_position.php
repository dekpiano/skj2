<?php
class Admin_model_position extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function position_insert($data)
	{
		return $this->db->insert('tb_position',$data);
	}

	public function position_update($data)
	{
		return $this->db->update('tb_position',$data,"posi_id='".$this->input->post('posi_id')."'");
	}

	public function position_delete($id)
	{
			$this->db->where('posi_id', $id);
		return $this->db->delete('tb_position');
	}

}