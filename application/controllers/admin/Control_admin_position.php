<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_position extends CI_Controller {
	
	var  $title = "ตำแหน่ง";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_position');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_position');
		$this->db->order_by('posi_id','DESC');
		$data['posi'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/position/admin_position_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/position') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_position');
		$this->db->order_by('posi_id','DESC');
		$data['posi'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['posi'][0]->posi_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['position'] = 'posi_'.$num1;
        $data['action'] = 'insert_position';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/position/admin_position_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_position()
	{
		$data = array(	'posi_id' => $this->input->post('posi_id'),
						'posi_name' => $this->input->post('posi_name')
					);
		if($this->Admin_model_position->position_insert($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
			redirect('admin/position', 'refresh');
		}

		
	}

	public function edit_position($id)
	{
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/position') => 'จัดการตำแหน่ง','#' =>'แก้ไขตำแหน่ง' );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_position');
		$this->db->where('posi_id',$id);
		$data['posi'] =	$this->db->get()->result();
		$data['action'] = 'update_position';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/position/admin_position_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_position()
	{
		$data = array(	
						'posi_name' => $this->input->post('posi_name')
					);
		if($this->Admin_model_position->position_update($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
			redirect('admin/position', 'refresh');
		}
	}

	public function delete_position($data)
	{
		if($this->Admin_model_position->position_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/position', 'refresh');
		}
	}

	

}

?>