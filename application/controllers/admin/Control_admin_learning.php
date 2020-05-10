<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_learning extends CI_Controller {
	
	var  $title = "กลุ่มสาระ";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_learning');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_learning');
		$this->db->order_by('lear_id','DESC');
		$data['lear'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/learning/admin_learning_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/learning') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_learning');
		$this->db->order_by('lear_id','DESC');
		$data['lear'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['lear'][0]->lear_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['learning'] = 'lear_'.$num1;
        $data['action'] = 'insert_learning';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/learning/admin_learning_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_learning()
	{
		$data = array(	'lear_id' => $this->input->post('lear_id'),
						'lear_namethai' => $this->input->post('lear_namethai'),
						'lear_nameeng' => $this->input->post('lear_nameeng')
					);
		if($this->Admin_model_learning->learning_insert($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
			redirect('admin/learning', 'refresh');
		}

		
	}

	public function edit_learning($id)
	{
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/learning') => 'จัดการข้อมูล'.$this->title,'#' =>'แก้ไขข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_learning');
		$this->db->where('lear_id',$id);
		$data['lear'] =	$this->db->get()->result();
		$data['action'] = 'update_learning';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/learning/admin_learning_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_learning()
	{
		$data = array(	
						'lear_namethai' => $this->input->post('lear_namethai'),
						'lear_nameeng' => $this->input->post('lear_nameeng')
					);
		if($this->Admin_model_learning->learning_update($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
			redirect('admin/learning', 'refresh');
		}
	}

	public function delete_learning($data)
	{
		if($this->Admin_model_learning->learning_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/learning', 'refresh');
		}
	}

	

}

?>