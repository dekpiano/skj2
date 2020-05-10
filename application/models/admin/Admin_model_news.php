<?php
class Admin_model_news extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function news_insert($data)
	{
		return $this->db->insert('tb_news',$data);
	}

	public function news_update($data)
	{
		return $this->db->update('tb_news',$data,"news_id='".$this->input->post('news_id')."'");
	}

	public function news_delete($id)
	{
			$this->db->where('news_id', $id);
		return $this->db->delete('tb_news');
	}

}