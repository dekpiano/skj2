<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_images extends CI_Controller {
	
	var  $title = "รูปภาพกิจกรรม";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_images');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_images');
		$this->db->order_by('img_id','DESC');
		$data['img'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/images/admin_images_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/images') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_images');
		$this->db->order_by('img_id','DESC');
		$data['img'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['img'][0]->img_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['images'] = 'img_'.$num1;
        $data['action'] = 'insert_images';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/images/admin_images_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_images()
	{
		$data = array(	'img_id' => $this->input->post('img_id'),
						'img_title' => $this->input->post('img_title'),
						'img_link' => $this->input->post('img_link'),
						'img_mainpic' => $this->input->post('img_mainpic'),
						'img_date' => $this->input->post('img_date'),
						'img_userid' => $this->session->userdata('login_id')
					);
		if($this->Admin_model_images->images_insert($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
			redirect('admin/images', 'refresh');
		}

		
	}

	public function edit_images($id)
	{
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/images') => 'จัดการตำแหน่ง','#' =>'แก้ไขตำแหน่ง' );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_images');
		$this->db->where('img_id',$id);
		$data['img'] =	$this->db->get()->result();
		$data['action'] = 'update_images';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/images/admin_images_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_images()
	{
		$data = array(	
						'img_title' => $this->input->post('img_title'),
						'img_link' => $this->input->post('img_link'),
						'img_mainpic' => $this->input->post('img_mainpic'),
						'img_date' => $this->input->post('img_date'),
						'img_userid' => $this->session->userdata('login_id')
					);
		if($this->Admin_model_images->images_update($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
			redirect('admin/images', 'refresh');
		}
	}

	public function delete_images($data)
	{
		if($this->Admin_model_images->images_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/images', 'refresh');
		}
	}

	

}

?>