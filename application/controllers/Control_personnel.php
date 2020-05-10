<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_personnel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->model('model_personnel');
		
	}
	public static $title = "บุคลากรโรงเรียน";
	public static $description = "บุคลากรโรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";

	public function show_per_all()
	{
		$data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		// print_r($id);
		$data['title'] = self::$title;
		$data['description'] = self::$description;
		$data['lear'] =	$this->db->get('tb_learning')->result(); //กลุ่มสาระ	
		$data['Allabout'] = $this->db->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
						$this->db->select('tb_personnel.pers_id, 
											tb_personnel.pers_prefix, 
											tb_personnel.pers_firstname, 
											tb_personnel.pers_lastname, 
											tb_position.posi_name, 
											tb_personnel.pers_position, 
											tb_personnel.pers_img');
						$this->db->from('tb_personnel');
						$this->db->join('tb_position','tb_personnel.pers_position = tb_position.posi_id');
		$data['pers'] = $this->db->get()->result(); //เกี่ย่วกับโรงเรียน
		$this->db->select('tb_personnel.pers_id, 
											tb_personnel.pers_prefix, 
											tb_personnel.pers_firstname, 
											tb_personnel.pers_lastname, 
											tb_position.posi_name, 
											tb_personnel.pers_position, 
											tb_personnel.pers_img');
						$this->db->from('tb_personnel');
						$this->db->join('tb_position','tb_personnel.pers_position = tb_position.posi_id');
		$data['pers_type'] = $this->db->get()->result(); //เกี่ย่วกับโรงเรียน

		$this->load->view('user/layout/header.php',$data);
		$this->load->view('user/personnel/personnel_all.php');
		$this->load->view('user/layout/footer.php');
	}

	public function show_per_type($name){
		$data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$data['title'] = self::$title;
		$data['description'] = self::$description;
		$data['lear'] =	$this->db->get('tb_learning')->result(); //กลุ่มสาระ	
		$data['Allabout'] = $this->db->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
						$this->db->select('	tb_personnel.pers_id, 
										tb_personnel.pers_prefix, 
										tb_personnel.pers_firstname, 
										tb_personnel.pers_lastname, 
										tb_position.posi_name, 
										tb_personnel.pers_position, 
										tb_personnel.pers_img');
						$this->db->from('tb_personnel');
						$this->db->join('tb_position','tb_personnel.pers_position = tb_position.posi_id');
		$data['pers'] = $this->db->get()->result(); //เกี่ย่วกับโรงเรียน
		$this->db->select('	tb_personnel.pers_id, 
							tb_personnel.pers_prefix, 
							tb_personnel.pers_firstname, 
							tb_personnel.pers_lastname, 
							tb_position.posi_name, 
							tb_personnel.pers_position, 
							tb_personnel.pers_img, 
							tb_personnel.pers_learning, 
							tb_learning.lear_namethai');
						$this->db->from('tb_personnel');
						$this->db->join('tb_position','tb_personnel.pers_position = tb_position.posi_id');
						$this->db->join('tb_learning','tb_personnel.pers_learning = tb_learning.lear_id');
						$this->db->where('lear_namethai',$name);
		$data['pers_type'] = $this->db->get()->result(); //เกี่ย่วกับโรงเรียน

		$this->load->view('user/layout/header.php',$data);
		$this->load->view('user/personnel/personnel_all.php');
		$this->load->view('user/layout/footer.php');

	}


}