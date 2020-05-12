<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_personnel extends CI_Controller {
	
	var  $title = "บุคลากร";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_personnel');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	

	public function index()
	{	
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_personnel');
		$this->db->order_by('pers_id','DESC');
		$data['pers'] =	$this->db->get()->result();

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/personnel/admin_personnel_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		$data['lear'] =	$this->db->get('tb_learning')->result(); //กลุ่มสาระ
		$data['posi'] =	$this->db->get('tb_position')->result(); //ตำแหน่ง
		$data['depart'] =	$this->db->get('tb_department')->result(); //กลุ่มงาน
		$data['work'] =	$this->db->get('tb_workother')->result(); //กลุ่มงาน

		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/personnel') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_personnel');
		$this->db->order_by('pers_id','DESC');
		$data['pers'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['pers'][0]->pers_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['personnel'] = 'pers_'.$num1;
        $data['action'] = 'insert_personnel';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/personnel/admin_personnel_form.php');

		$this->load->view('admin/layout/footer.php');
	}
															
	public function insert_personnel()
	{	
		if($_FILES['banner_img']['error'] == 0){
		$config['upload_path']   = 'uploads/personnel/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
         $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_width']     = 600; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_height']    = 800;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['encrypt_name']  = true; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('banner_img'))
			{
				$data = array('upload_data' => $this->upload->data());

				$data = array(	'pers_id' => $this->input->post('pers_id'),
						'pers_prefix' => $this->input->post('pers_prefix'),
						'pers_firstname' => $this->input->post('pers_firstname'),
						'pers_lastname' => $this->input->post('pers_lastname'),
						'pers_britday' => $this->chang_date_thai($this->input->post('pers_britday')),
						'pers_address' => $this->input->post('pers_address'),
						'pers_phone' => $this->input->post('pers_phone'),
						'pers_department' => $this->input->post('pers_department'),
						'pers_position' => $this->input->post('pers_position'),
						'pers_learning' => $this->input->post('pers_learning'),
						'pers_groupleade' => $this->input->post('pers_groupleade'),
						'pers_workother_id' => implode("|",$this->input->post('pers_workother_id')),
						'pers_username' => $this->input->post('pers_username'),
						'pers_password' => md5(md5(str_replace('-','', $this->input->post('pers_britday')))),
						'pers_status' => "online",
						'pers_img' => $data['upload_data']['file_name']
					);
					if($this->Admin_model_personnel->personnel_insert($data) == 1){
						$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
						redirect('admin/personnel', 'refresh');
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
		}else{
			$data = array(	'pers_id' => $this->input->post('pers_id'),
						'pers_prefix' => $this->input->post('pers_prefix'),
						'pers_firstname' => $this->input->post('pers_firstname'),
						'pers_lastname' => $this->input->post('pers_lastname'),
						'pers_britday' => $this->chang_date_thai($this->input->post('pers_britday')),
						'pers_address' => $this->input->post('pers_address'),
						'pers_phone' => $this->input->post('pers_phone'),
						'pers_department' => $this->input->post('pers_department'),
						'pers_position' => $this->input->post('pers_position'),
						'pers_learning' => $this->input->post('pers_learning'),
						'pers_groupleade' => $this->input->post('pers_groupleade'),
						'pers_workother_id' => implode("|",$this->input->post('pers_workother_id')),
						'pers_username' => $this->input->post('pers_username'),
						'pers_password' => md5(md5(str_replace('-','', $this->input->post('pers_britday')))),
						'pers_status' => "online"
					);
			if($this->Admin_model_personnel->personnel_insert($data) == 1){
						$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
						redirect('admin/personnel', 'refresh');
					}
		}
		
	}

	public function edit_personnel($id)
	{
		$data['lear'] =	$this->db->get('tb_learning')->result(); //กลุ่มสาระ
		$data['posi'] =	$this->db->get('tb_position')->result(); //ตำแหน่ง
		$data['depart'] =	$this->db->get('tb_department')->result(); //กลุ่มงาน
		$data['work'] =	$this->db->get('tb_workother')->result(); //กลุ่มงาน

		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/personnel') => 'จัดการข้อมูล'.$this->title,'#' =>'แก้ไขข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_personnel');
		$this->db->where('pers_id',$id);
		$data['pers'] =	$this->db->get()->result();
		$data['action'] = 'update_personnel/'.($data['pers'][0]->pers_img == '' ? '0' : $data['pers'][0]->pers_img);

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/personnel/admin_personnel_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_personnel($img)
	{	
		if($_FILES['banner_img']['error'] == 0 ){
		$config['upload_path']   = 'uploads/personnel/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
         $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_width']     = 600; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_height']    = 800;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['encrypt_name']  = true; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('banner_img'))
			{
				$data = array('upload_data' => $this->upload->data());

				@unlink("./uploads/personnel/".$img); 

				$data = array(	
						'pers_prefix' => $this->input->post('pers_prefix'),
						'pers_firstname' => $this->input->post('pers_firstname'),
						'pers_lastname' => $this->input->post('pers_lastname'),
						'pers_britday' =>  $this->chang_date_thai($this->input->post('pers_britday')),
						'pers_address' => $this->input->post('pers_address'),
						'pers_phone' => $this->input->post('pers_phone'),
						'pers_department' => $this->input->post('pers_department'),
						'pers_position' => $this->input->post('pers_position'),
						'pers_learning' => $this->input->post('pers_learning'),
						'pers_groupleade' => $this->input->post('pers_groupleade'),
						'pers_workother_id' => implode("|",$this->input->post('pers_workother_id')),
						'pers_username' => $this->input->post('pers_username'),
						'pers_img' => $data['upload_data']['file_name']
					);
					if($this->Admin_model_personnel->personnel_update($data) == 1){
						$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
						redirect('admin/personnel', 'refresh');
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
		}else{
					$data = array(	
						'pers_prefix' => $this->input->post('pers_prefix'),
						'pers_firstname' => $this->input->post('pers_firstname'),
						'pers_lastname' => $this->input->post('pers_lastname'),
						'pers_britday' => $this->chang_date_thai($this->input->post('pers_britday')),
						'pers_address' => $this->input->post('pers_address'),
						'pers_phone' => $this->input->post('pers_phone'),
						'pers_department' => $this->input->post('pers_department'),
						'pers_position' => $this->input->post('pers_position'),
						'pers_learning' => $this->input->post('pers_learning'),
						'pers_groupleade' => $this->input->post('pers_groupleade'),
						'pers_workother_id' => implode("|",$this->input->post('pers_workother_id')),
						'pers_username' => $this->input->post('pers_username')
					);
					if($this->Admin_model_personnel->personnel_update($data) == 1){
						$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
						redirect('admin/personnel', 'refresh');
					}
		}

	}

	public function delete_personnel($data)
	{
		if($this->Admin_model_personnel->personnel_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/personnel', 'refresh');
		}
	}

	public function chang_date_thai($value)
	{
		
			$dated = date("-m-d", strtotime($value));
         $datey = date("Y", strtotime($value))-543;
      	return   $d =  $datey.$dated;
	}
	

}

?>