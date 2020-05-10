<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_aboutschool extends CI_Controller {
	
	var  $title = "เกี่ยวกับโรงเรียน";
	
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('admin/Admin_model_aboutschool');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_aboutschool');
		$this->db->order_by('about_id','DESC');
		$data['aboutschool'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/aboutschool/admin_aboutschool_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/aboutschool') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_aboutschool');
		$this->db->order_by('about_id','DESC');
		$data['aboutschool'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['aboutschool'][0]->about_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['aboutschool'] = 'about_'.$num1;
        $data['action'] = 'insert_aboutschool';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/aboutschool/admin_aboutschool_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_aboutschool()
	{
				
			$data = array(	'about_id' => $this->input->post('about_id'),
							'about_menu' => $this->input->post('about_menu'),
							'about_detail' => $this->input->post('about_detail'),
							'about_date' => date('Y-m-d H:i:s'),
							'about_personnel_id' => $this->session->userdata('login_id')
						);
			if($this->Admin_model_aboutschool->aboutschool_insert($data) == 1){
				$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
				redirect('admin/aboutschool', 'refresh');
			}
		
	}

	public function edit_aboutschool($id)
	{
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/aboutschool') => 'จัดการข้อมูล'.$this->title,'#' =>'แก้ไขข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_aboutschool');
		$this->db->where('about_id',$id);
		$data['aboutschool'] =	$this->db->get()->result();
		$data['action'] = 'update_aboutschool';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/aboutschool/admin_aboutschool_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_aboutschool()
	{
			$data = array(	
							'about_menu' => $this->input->post('about_menu'),
							'about_detail' => $this->input->post('about_detail'),
							'about_date' => date('Y-m-d H:i:s'),
							'about_personnel_id' => $this->session->userdata('login_id')
						);
			if($this->Admin_model_aboutschool->aboutschool_update($data) == 1){
				$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
				redirect('admin/aboutschool', 'refresh');
			}


		
	}

	public function delete_aboutschool($data)
	{
		if($this->Admin_model_aboutschool->aboutschool_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/aboutschool', 'refresh');
		}
	}

	
	

}

?>