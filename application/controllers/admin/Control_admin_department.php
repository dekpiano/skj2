<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_department extends CI_Controller {
	
	var  $title = "กลุ่มงาน";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_department');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_department');
		$this->db->order_by('depart_id','DESC');
		$data['depart'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/department/admin_department_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/department') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_department');
		$this->db->order_by('depart_id','DESC');
		$data['depart'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['depart'][0]->depart_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['department'] = 'depart_'.$num1;
        $data['action'] = 'insert_department';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/department/admin_department_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_department()
	{
		$data = array(	'depart_id' => $this->input->post('depart_id'),
						'depart_name' => $this->input->post('depart_name')
					);
		if($this->Admin_model_department->department_insert($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
			redirect('admin/department', 'refresh');
		}

		
	}

	public function edit_department($id)
	{
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/department') => 'จัดการตำแหน่ง','#' =>'แก้ไขตำแหน่ง' );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_department');
		$this->db->where('depart_id',$id);
		$data['depart'] =	$this->db->get()->result();
		$data['action'] = 'update_department';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/department/admin_department_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_department()
	{
		$data = array(	
						'depart_name' => $this->input->post('depart_name')
					);
		if($this->Admin_model_department->department_update($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
			redirect('admin/department', 'refresh');
		}
	}

	public function delete_department($data)
	{
		if($this->Admin_model_department->department_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/department', 'refresh');
		}
	}

	

}

?>