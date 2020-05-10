<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_adminmenu extends CI_Controller {
	
	var  $title = "เมนู";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_adminmenu');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$this->db->select('*');
		$this->db->from('tb_adminmenu');
		$this->db->order_by('Amenu_id','DESC');
		$data['Amenu'] =	$this->db->get()->result();
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/adminmenu/admin_adminmenu_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		$data['work'] =	$this->db->get('tb_workother')->result(); //กลุ่มงาน 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/adminmenu') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();


		$this->db->select('*');
		$this->db->from('tb_adminmenu');
		$this->db->order_by('Amenu_id','DESC');
		$data['Amenu'] =	$this->db->get()->result();
		$data['AmenuAll'] =	$this->db->get('tb_adminmenu')->result();
		
		$num = @explode("_", $data['Amenu'][0]->Amenu_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['adminmenu'] = 'Amenu_'.$num1;
        $data['action'] = 'insert_adminmenu';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/adminmenu/admin_adminmenu_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function check_maxRankMenu()
	{
		return $this->db->select_max('Amenu_rank')->get('tb_adminmenu')->result();
	}

	public function insert_adminmenu()
	{	
		$cke_rank = $this->check_maxRankMenu();
		$data = array(	'Amenu_id' => $this->input->post('Amenu_id'),
						'Amenu_name' => $this->input->post('Amenu_name'),
						'Amenu_url' => $this->input->post('Amenu_url'),
						'Amenu_rank' => ($cke_rank[0]->Amenu_rank+1),						
						'Amenu_submenu' => $this->input->post('Amenu_submenu'),
						'Amenu_group' => $this->input->post('Amenu_group'),
						'Amenu_permission' => implode("|",$this->input->post('Amenu_permission'))
					);
		if($this->Admin_model_adminmenu->adminmenu_insert($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
			redirect('admin/adminmenu', 'refresh');
		}
	}

	public function edit_adminmenu($id)
	{
		/* Bread crum */
		$data['work'] =	$this->db->get('tb_workother')->result(); //กลุ่มงาน 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/adminmenu') => 'จัดการตำแหน่ง','#' =>'แก้ไขตำแหน่ง' );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_adminmenu');
		$this->db->where('Amenu_id',$id);
		$data['Amenu'] =	$this->db->get()->result();
		$data['AmenuAll'] =	$this->db->get('tb_adminmenu')->result();
		$data['action'] = 'update_adminmenu';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/adminmenu/admin_adminmenu_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_adminmenu()
	{
		$data = array(	
						'Amenu_name' => $this->input->post('Amenu_name'),
						'Amenu_url' => $this->input->post('Amenu_url'),
						'Amenu_submenu' => $this->input->post('Amenu_submenu'),
						'Amenu_group' => $this->input->post('Amenu_group'),
						'Amenu_permission' => implode("|",$this->input->post('Amenu_permission'))
					);
		if($this->Admin_model_adminmenu->adminmenu_update($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
			redirect('admin/adminmenu', 'refresh');
		}
	}

	public function delete_adminmenu($data)
	{
		if($this->Admin_model_adminmenu->adminmenu_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/adminmenu', 'refresh');
		}
	}

	

}

?>