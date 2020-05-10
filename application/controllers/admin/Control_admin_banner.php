<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_banner extends CI_Controller {
	
	var  $title = "แบนเนอร์";
	
	public function __construct() {
		parent::__construct();
		 $this->load->helper(array('form', 'url'));
		$this->load->model('admin/Admin_model_banner');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_banner');
		$this->db->order_by('banner_id','DESC');
		$data['banner'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/banner/admin_banner_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		 
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/banner') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_banner');
		$this->db->order_by('banner_id','DESC');
		$data['banner'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['banner'][0]->banner_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['banner'] = 'banner_'.$num1;
        $data['action'] = 'insert_banner';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/banner/admin_banner_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_banner()
	{
		//print_r($_FILES);
		
		$config['upload_path']   = 'uploads/banner/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
         $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_width']     = 1920; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_height']    = 720;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['encrypt_name']  = true; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('banner_img'))
			{
				$data = array('upload_data' => $this->upload->data());

				$data_insert = array(	'banner_id' => $this->input->post('banner_id'),
						'banner_name' => $this->input->post('banner_name'),
						'banner_img' => $data['upload_data']['file_name'],
						'banner_date' => date('Y-m-d H:i:s'),
						'banner_linkweb' => $this->input->post('banner_linkweb'),
						'banner_personnel_id' => $this->session->userdata('login_id')
					);
				if($this->Admin_model_banner->banner_insert($data_insert) == 1){
					$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
					redirect('admin/banner', 'refresh');
				}
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				//print_r($error['error']);
				$this->session->set_flashdata(array('msg_uploadfile'=> 'on','messge' => 'รูปไม่ได้ขนาดที่กำหนดไว้'));
				?>
				<script>					
					  window.history.back();					
					</script>
				<?php
			}
		
	}

	public function edit_banner($id)
	{
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/banner') => 'จัดการข้อมูล'.$this->title,'#' =>'แก้ไขข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_banner');
		$this->db->where('banner_id',$id);
		$data['banner'] =	$this->db->get()->result();
		$data['action'] = 'update_banner/'.$data['banner'][0]->banner_img;

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/banner/admin_banner_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_banner($img)
	{

		$config['upload_path']   = 'uploads/banner/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
         $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_width']     = 1920; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_height']    = 720;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['encrypt_name']  = true; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('banner_img'))
			{
				$data = array('upload_data' => $this->upload->data());

				@unlink("./uploads/banner/".$img);
				$data_update = array(
						'banner_name' => $this->input->post('banner_name'),
						'banner_img' => $data['upload_data']['file_name'],
						'banner_linkweb' => $this->input->post('banner_linkweb'),
						'banner_personnel_id' => $this->session->userdata('login_id')
					);
				if($this->Admin_model_banner->banner_update($data_update) == 1){
					$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
					redirect('admin/banner', 'refresh');
				}
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				
				$data_update = array(
						'banner_name' => $this->input->post('banner_name'),
						'banner_linkweb' => $this->input->post('banner_linkweb'),
						'banner_personnel_id' => $this->session->userdata('login_id')
					);
				if($this->Admin_model_banner->banner_update($data_update) == 1){
					$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
					redirect('admin/banner', 'refresh');
				}
			}


	
		
	}

	public function delete_banner($data,$img)
	{	
		@unlink("./uploads/banner/".$img);
		if($this->Admin_model_banner->banner_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/banner', 'refresh');
		}
	}

	

}

?>