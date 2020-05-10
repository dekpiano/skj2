<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_workother extends CI_Controller {
	
	var  $title = "ตำแหน่งงานอื่น";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_workother');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_workother');
		$this->db->order_by('work_id','DESC');
		$data['work'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/workother/admin_workother_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/workother') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_workother');
		$this->db->order_by('work_id','DESC');
		$data['work'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['work'][0]->work_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['workother'] = 'work_'.$num1;
        $data['action'] = 'insert_workother';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/workother/admin_workother_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_workother()
	{
		$data = array(	'work_id' => $this->input->post('work_id'),
						'work_name' => $this->input->post('work_name')
					);
		if($this->Admin_model_workother->workother_insert($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
			redirect('admin/workother', 'refresh');
		}

		
	}

	public function edit_workother($id)
	{
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/workother') => 'จัดการตำแหน่ง','#' =>'แก้ไขตำแหน่ง' );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_workother');
		$this->db->where('work_id',$id);
		$data['work'] =	$this->db->get()->result();
		$data['action'] = 'update_workother';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/workother/admin_workother_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_workother()
	{
		$data = array(	
						'work_name' => $this->input->post('work_name')
					);
		if($this->Admin_model_workother->workother_update($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
			redirect('admin/workother', 'refresh');
		}
	}

	public function delete_workother($data)
	{
		if($this->Admin_model_workother->workother_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/workother', 'refresh');
		}
	}

	

}

?>