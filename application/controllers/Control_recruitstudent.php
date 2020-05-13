<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_recruitstudent extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('timeago');
		$this->load->model('model_recruitstudent');
		
		//exit();
	}

	public static $title = "รับสมัครนักเรียนปีการศึกษา 2563";
	public static $description = "รับสมัครนักเรียนวันนี้ จนถึง 12 พฤษภาคม 2563";

	public function dataAll()
	{
		$data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$data['title'] = self::$title;
		$data['description'] = self::$description;
		$data['lear'] =	$this->db->get('tb_learning')->result(); //กลุ่มสาระ
		$data['Allabout'] = $this->db->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
		$data['about'] = $this->db->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
		$data['banner'] =	$this->db->get('tb_banner')->result(); //ประชาสัมพันธ์

		return $data;
	}

	public function index()
	{
		redirect('CloseStudent'); 
		$data = $this->dataAll();
		//$this->session->sess_destroy();
		$this->load->view('user/layout/header.php',$data);
		$this->load->view('user/recruitstudent/main_student.php');
		$this->load->view('user/layout/footer.php');
	}

	public function welcome_student($id=''){

		$data = $this->dataAll();

		//print_r($id);
		if ($id == 'Succeed') {
			$this->load->view('user/layout/header.php',$data);
			$this->load->view('user/recruitstudent/welcome_student.php');
			$this->load->view('user/layout/footer.php');
		}elseif($id == 'Error'){
			$this->session->set_flashdata(array('msg'=> 'NO','messge' => 'คุณได้ลงทะเบียนแล้ว กรุณาตรวจสอบการสมัคร'));
			//redirect('RegStudent');
			$this->load->view('user/layout/header.php',$data);
			$this->load->view('user/layout/footer.php'); 
			;?>
<script type="text/javascript">
setTimeout(function() {
    window.history.back();
}, 5000);
</script>
<?php }else{
			redirect('RegStudent');
		}
	}


	public function reg_student($id)
	{
		redirect('CloseStudent'); 
		$data = $this->dataAll();

		if ($id > 0) {
			$this->load->view('user/layout/header.php',$data);
			$this->load->view('user/recruitstudent/reg_student.php');
			$this->load->view('user/layout/footer.php');
		}

		
	}

	public function reg_insert()
	{	
		//print_r($this->input->post('recruit_idCard'));
		$data['chk_stu'] = $this->db->where('recruit_idCard',$this->input->post('recruit_idCard'))->get('tb_recruitstudent')->result();
		if (count($data['chk_stu']) > 0) {
			$this->session->set_flashdata(array('msg'=> 'NO','messge' => 'คุณได้ลงทะเบียนแล้ว กรุณาตรวจสอบการสมัคร'));
			redirect('RegStudent/welcome/Error');
		}else{
		$data_insert = array();
		$recruit_birthday = ($this->input->post('recruit_birthdayY')-543).'-'.$this->input->post('recruit_birthdayM').'-'.$this->input->post('recruit_birthdayD');
		$data_insert += array(
			'recruit_regLevel' => $this->input->post('recruit_regLevel'),
			'recruit_prefix' => $this->input->post('recruit_prefix'),
			'recruit_firstName' => $this->input->post('recruit_firstName'),
			'recruit_lastName' => $this->input->post('recruit_lastName'),
			'recruit_oldSchool' => $this->input->post('recruit_oldSchool'),
			'recruit_district' => $this->input->post('recruit_district'),
			'recruit_province' => $this->input->post('recruit_province'),
			'recruit_birthday' => $recruit_birthday,
			'recruit_race' => $this->input->post('recruit_race'),
			'recruit_nationality' => $this->input->post('recruit_nationality'), 
			'recruit_religion' => $this->input->post('recruit_religion'),
			'recruit_idCard' => $this->input->post('recruit_idCard'),
			'recruit_phone' => $this->input->post('recruit_phone'),
			'recruit_homeNumber' => $this->input->post('recruit_homeNumber'),
			'recruit_homeGroup' => $this->input->post('recruit_homeGroup'),
			'recruit_homeRoad' => $this->input->post('recruit_homeRoad'),
			'recruit_homeSubdistrict' => $this->input->post('recruit_homeSubdistrict'),
			'recruit_homedistrict' => $this->input->post('recruit_homedistrict'),
			'recruit_homeProvince' => $this->input->post('recruit_homeProvince'),
			'recruit_homePostcode' => $this->input->post('recruit_homePostcode'),
			'recruit_tpyeRoom' => $this->input->post('recruit_tpyeRoom'),
			'recruit_date'	=> date('Y-m-d'), 						
			'recruit_year' => (date('Y')+543)
			);


			if($_FILES['recruit_img']['error']==0){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_img']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_img']['error'];
				$foder = 'img';
				$do_upload = 'recruit_img';
				$rand_name = $this->input->post('recruit_idCard').rand();				
					$data_insert += array('recruit_img' => $rand_name.'.'.$imageFileType);	
					$this->reg_img($foder,$do_upload,$imageFileType,$rand_name,$data_insert);
				

			}if($_FILES['recruit_certificateEdu']['error']==0){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_certificateEdu']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_certificateEdu']['error'];
				$foder = 'certificate';
				$do_upload = 'recruit_certificateEdu';
				$rand_name = $this->input->post('recruit_idCard').rand();				
					$data_insert += array('recruit_certificateEdu' => $rand_name.'.'.$imageFileType);
					$this->reg_img($foder,$do_upload,$imageFileType,$rand_name,$data_insert);
				
			}if($_FILES['recruit_copyidCard']['error'] == 0){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_copyidCard']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_copyidCard']['error'];
				$foder = 'copyidCard';
				$do_upload = 'recruit_copyidCard';
				$rand_name = $this->input->post('recruit_idCard').rand();				
					$data_insert += array('recruit_copyidCard' => $rand_name.'.'.$imageFileType);
					$this->reg_img($foder,$do_upload,$imageFileType,$rand_name,$data_insert);
				
			}if($_FILES['recruit_copyAddress']['error'] == 0){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_copyAddress']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_copyAddress']['error'];
				$foder = 'copyAddress';
				$do_upload = 'recruit_copyAddress';
				$rand_name = $this->input->post('recruit_idCard').rand();
				$data_insert += array('recruit_copyAddress' => $rand_name.'.'.$imageFileType);
					$this->reg_img($foder,$do_upload,$imageFileType,$rand_name,$data_insert);
				
				
			}

			//print_r($data_insert);

				if($this->model_recruitstudent->student_insert($data_insert) == 1){
						
						//redirect('RegStudent/checkRegister?search_stu='.$this->input->post('recruit_idCard'), 'refresh');
				redirect('RegStudent/welcome/Succeed');
				}

		}
		//exit();
	}



	
	public function reg_img($foder,$do_upload,$imageFileType,$rand_name,$data_insert)
	{
		
		 $config['upload_path']   = 'uploads/recruitstudent/m'.$this->input->post('recruit_regLevel').'/'.$foder.'/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
         $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_width']     = 0; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_height']    = 0;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['file_name']  = $rand_name.'.'.$imageFileType; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload($do_upload))
			{
				$data = array('upload_data' => $this->upload->data());
				// if($this->model_recruitstudent->student_insert($data_insert) == 1){
				//  		$this->session->set_flashdata(array('msg'=> 'NO','messge' => 'แก้ไขข้อมูลสำเร็จ'));				 	
				//  }
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error['error']);
				
			}
	}
	
	public function check_student()
	{	

		$data = $this->dataAll();


		 $this->load->view('user/layout/header.php',$data);
		$this->load->view('user/recruitstudent/check_student.php');
		$this->load->view('user/layout/footer.php');
		
	}

	public function data_user()
	{
		$this->session->sess_destroy();
		$data = $this->dataAll();

		// if ($this->input->get('Succeed') == 1) {
		// 	$this->session->set_flashdata(array('msg'=> 'NO','messge' => 'แก้ไขข้อมูลสำเร็จ'));
		// }

		if ($this->input->get('search_stu') != '') {
			$data['chk_stu'] = $this->db->where('recruit_idCard',$this->input->get('search_stu'))->get('tb_recruitstudent')->result();
			if (count($data['chk_stu']) <= 0 && $this->input->get('search_stu') != '') {
				$this->session->set_flashdata(array('msg'=> 'NO','alert'=>'danger','messge' => 'ไม่มีข้อมูลในระบบ หรือ ยังไม่ได้ลงทะเบียนเรียน'));
				$this->load->view('user/layout/header.php',$data);
				$this->load->view('user/recruitstudent/check_student.php');
				$this->load->view('user/layout/footer.php');
				}else{
				
						$this->load->view('user/layout/header.php',$data);
						$this->load->view('user/recruitstudent/datauser_student.php');
						$this->load->view('user/layout/footer.php');
			}
		}else{
			$this->load->view('user/layout/header.php',$data);
			$this->load->view('user/recruitstudent/check_student.php');
			$this->load->view('user/layout/footer.php');
		}
		
		 
	}


	public function reg_update($id,$img)
	{	
		
		$data_R = $this->db->where('recruit_id',$id)->get('tb_recruitstudent')->result();
		
		$file = array($_FILES['recruit_img']['error'],
							$_FILES['recruit_certificateEdu']['error'],
							$_FILES['recruit_copyidCard']['error'],
							$_FILES['recruit_copyAddress']['error']);
		//print_r($file);
		$recruit_birthday = ($this->input->post('recruit_birthdayY')-543).'-'.$this->input->post('recruit_birthdayM').'-'.$this->input->post('recruit_birthdayD');
		$data_update = array(
			'recruit_regLevel' => $this->input->post('recruit_regLevel'),
			'recruit_prefix' => $this->input->post('recruit_prefix'),
			'recruit_firstName' => $this->input->post('recruit_firstName'),
			'recruit_lastName' => $this->input->post('recruit_lastName'),
			'recruit_oldSchool' => $this->input->post('recruit_oldSchool'),
			'recruit_district' => $this->input->post('recruit_district'),
			'recruit_province' => $this->input->post('recruit_province'),
			'recruit_birthday' => $recruit_birthday,
			'recruit_race' => $this->input->post('recruit_race'),
			'recruit_nationality' => $this->input->post('recruit_nationality'), 
			'recruit_religion' => $this->input->post('recruit_religion'),
			'recruit_idCard' => $this->input->post('recruit_idCard'),
			'recruit_phone' => $this->input->post('recruit_phone'),
			'recruit_homeNumber' => $this->input->post('recruit_homeNumber'),
			'recruit_homeGroup' => $this->input->post('recruit_homeGroup'),
			'recruit_homeRoad' => $this->input->post('recruit_homeRoad'),
			'recruit_homeSubdistrict' => $this->input->post('recruit_homeSubdistrict'),
			'recruit_homedistrict' => $this->input->post('recruit_homedistrict'),
			'recruit_homeProvince' => $this->input->post('recruit_homeProvince'),
			'recruit_homePostcode' => $this->input->post('recruit_homePostcode'),
			'recruit_tpyeRoom' => $this->input->post('recruit_tpyeRoom'),	
			'recruit_dateUpdate' => date('Y-m-d H:i:s'),						
			'recruit_year' => (date('Y')+543)
		);
	
			if(in_array($_FILES['recruit_img']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_img']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_img']['error'];
				$foder = 'img';
				$do_upload = 'recruit_img';
				$rand_name = $this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_img' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_img,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_img,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
				

			}if(in_array($_FILES['recruit_certificateEdu']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_certificateEdu']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_certificateEdu']['error'];
				$foder = 'certificate';
				$do_upload = 'recruit_certificateEdu';
				$rand_name = $this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_certificateEdu' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_certificateEdu,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_certificateEdu,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
			}if(in_array($_FILES['recruit_copyidCard']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_copyidCard']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_copyidCard']['error'];
				$foder = 'copyidCard';
				$do_upload = 'recruit_copyidCard';
				$rand_name = $this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_copyidCard' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_copyidCard,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_copyidCard,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
			}if(in_array($_FILES['recruit_copyAddress']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_copyAddress']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_copyAddress']['error'];
				$foder = 'copyAddress';
				$do_upload = 'recruit_copyAddress';
				$rand_name = $this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_copyAddress' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_copyAddress,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_copyAddress,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
				
			}

			
		redirect('checkRegister/dataStudent?search_stu='.$this->input->post('recruit_idCard').'&Succeed=1');
			
		
	}


	public function update_img($id,$img,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name)
	{
		if($file_check == 0 ){
		 $config['upload_path']   = 'uploads/recruitstudent/m'.$this->input->post('recruit_regLevel').'/'.$foder.'/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
         $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_width']     = 0; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_height']    = 0;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['file_name']  = $rand_name.'.'.$imageFileType; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload($do_upload))
			{
				
				$image_data = $this->upload->data();
				
				// print_r($data);
				@unlink("./uploads/recruitstudent/m".$this->input->post('recruit_regLevel').'/'.$foder.'/'.$img);

				
					$this->image_lib->clear();
				

				if($this->model_recruitstudent->student_update($data_update,$id) == 1){
				 		$this->session->set_flashdata(array('msg'=> 'NO','messge' => 'แก้ไขข้อมูลสำเร็จ'));				 	
				 }
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error['error']);
				
			}
		}
		else{

			if($this->model_recruitstudent->student_update($data_update,$id) == 1){
					$this->session->set_flashdata(array('msg'=> 'NO','messge' => 'แก้ไขข้อมูลสำเร็จ'));
					//redirect('RegStudent/checkRegister?search_stu='.$this->input->post('recruit_idCard'), 'refresh');
			
			}
		}
	}


	public function close_student()
	{
		$data = $this->dataAll();

		
			$this->load->view('user/layout/header.php',$data);
			$this->load->view('user/recruitstudent/close_student.php');
			$this->load->view('user/layout/footer.php');
		
	}

	public function print_student()
	{
		$data = $this->dataAll();

		$data['m1'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName')
		->where('recruit_regLevel','1')
		->get('tb_recruitstudent')->result();
		$data['m4'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName')
		->where('recruit_regLevel','4')
		->get('tb_recruitstudent')->result();
		
			$this->load->view('user/layout/header.php',$data);
			$this->load->view('user/recruitstudent/report_student.php');
			$this->load->view('user/layout/footer.php');		
	}
	public function check_print()
	{
		$data = $this->db->where('recruit_idCard',$this->input->post('search_stu'))->get('tb_recruitstudent')->result_array();
		echo ($data);
	}

	public function pdf($id)
    {
    	$datapdf = $this->db->where('recruit_id',$id)->get('tb_recruitstudent')->result();

    	$date_Y = date('Y',strtotime($datapdf[0]->recruit_birthday))+543;
    	$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    	$date_D = date('d',strtotime($datapdf[0]->recruit_birthday));
    	$date_M = date('n',strtotime($datapdf[0]->recruit_birthday));

    	$sch = explode("โรงเรียน", $datapdf[0]->recruit_oldSchool); //แยกคำว่าโรงเรียน
    	

        $mpdf = new \Mpdf\Mpdf([
					'default_font_size' => 16,
					'default_font' => 'sarabun'
				]);
        $mpdf->SetTitle($datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.' '.$datapdf[0]->recruit_lastName);
        $html = '<div style="position:absolute;top:60px;left:648px; width:100%"><img style="width: 120px;hight:auto;" src='.base_url('uploads/recruitstudent/m'.$datapdf[0]->recruit_regLevel.'/img/'.$datapdf[0]->recruit_img).'></div>'; 
        $html .= '<div style="position:absolute;top:15px;left:710px; width:100%">'.sprintf("%04d",$datapdf[0]->recruit_id).'</div>'; //
         $html .= '<div style="position:absolute;top:159px;left:565px; width:100%"><b>'.$datapdf[0]->recruit_regLevel.'</b></div>'; //	
		$html .= '<div style="position:absolute;top:270px;left:180px; width:100%">'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
		$html .= '<div style="position:absolute;top:270px;left:470px; width:100%">'.$datapdf[0]->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
		$html .= '<div style="position:absolute;top:297px;left:280px; width:100%">'.($sch[0] == '' ? $sch[1] : $sch[0]).'</div>'; //โรงเรียนเดิม
		$html .= '<div style="position:absolute;top:324px;left:170px; width:100%">'.$datapdf[0]->recruit_district.'</div>'; //อำเภอโรงเรียน
		$html .= '<div style="position:absolute;top:324px;left:510px; width:100%">'.$datapdf[0]->recruit_province.'</div>'; //จังหวัดโรงเรียน
		$html .= '<div style="position:absolute;top:353px;left:160px; width:100%">'.$date_D.'</div>'; //วันเกิด
		$html .= '<div style="position:absolute;top:353px;left:245px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือนเกิด
		$html .= '<div style="position:absolute;top:353px;left:375px; width:100%">'.$date_Y.'</div>'; //ปีเกิด
		$html .= '<div style="position:absolute;top:353px;left:470px; width:100%">'.$this->timeago->getAge($datapdf[0]->recruit_birthday).'</div>'; //อายุ
		$html .= '<div style="position:absolute;top:353px;left:600px; width:100%">'.$datapdf[0]->recruit_race.'</div>'; //เชื้อชาติ
		$html .= '<div style="position:absolute;top:382px;left:170px; width:100%">'.$datapdf[0]->recruit_nationality.'</div>'; //สัญชาติ
		$html .= '<div style="position:absolute;top:382px;left:320px; width:100%">'.$datapdf[0]->recruit_religion.'</div>'; //ศาสนา
		$html .= '<div style="position:absolute;top:382px;left:550px; width:100%">'.$datapdf[0]->recruit_idCard.'</div>'; //เลขบัตรประจำตัวประชาชน
		$html .= '<div style="position:absolute;top:410px;left:350px; width:100%">'.$datapdf[0]->recruit_phone.'</div>'; //เบอร์โทรติดต่อ
		$html .= '<div style="position:absolute;top:438px;left:270px; width:100%">'.$datapdf[0]->recruit_homeNumber.'</div>'; //บ้านเลขที่ //แก้*****
		$html .= '<div style="position:absolute;top:438px;left:390px; width:100%">'.$datapdf[0]->recruit_homeGroup.'</div>'; //หมู่
		$html .= '<div style="position:absolute;top:438px;left:465px; width:100%">'.$datapdf[0]->recruit_homeRoad.'</div>'; //ถนน
		$html .= '<div style="position:absolute;top:438px;left:620px; width:100%">'.$datapdf[0]->recruit_homeSubdistrict.'</div>'; //ตำบล
		$html .= '<div style="position:absolute;top:465px;left:185px; width:100%">'.$datapdf[0]->recruit_homedistrict.'</div>'; //อำเภอ
		$html .= '<div style="position:absolute;top:465px;left:400px; width:100%">'.$datapdf[0]->recruit_homeProvince.'</div>'; //จังหวัด
		$html .= '<div style="position:absolute;top:465px;left:620px; width:100%">'.$datapdf[0]->recruit_homePostcode.'</div>'; //รหัสไปรษณีย์
		$html .= '<div style="position:absolute;top:866px;left:50px; width:100%"><img style="width:120px;hight:100px;" src='.base_url('uploads/recruitstudent/m'.$datapdf[0]->recruit_regLevel.'/img/'.$datapdf[0]->recruit_img).'></div>'; 
		$html .= '<div style="position:absolute;top:840px;left:180px; width:100%">'.sprintf("%04d",$datapdf[0]->recruit_id).'</div>'; 
		$html .= '<div style="position:absolute;top:880px;left:230px; width:100%">'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
		$html .= '<div style="position:absolute;top:880px;left:470px; width:100%">'.$datapdf[0]->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
		$html .= '<div style="position:absolute;top:908;left:400px; width:100%">'.$datapdf[0]->recruit_idCard.'</div>';	
		$html .= '<div style="position:absolute;top:936;left:250px; width:100%">'.$datapdf[0]->recruit_tpyeRoom.'</div>';	

		 $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)' ); 
    	if($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[0]){
    		$html .= '<div style="position:absolute;top:525px;left:165px; width:100%"><img src="https://img.icons8.com/metro/26/000000/checkmark.png"/></div>';
    	}elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[1]){
    		$html .= '<div style="position:absolute;top:558px;left:165px; width:100%"><img src="https://img.icons8.com/metro/26/000000/checkmark.png"/></div>';
    	}elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[2]){
    		$html .= '<div style="position:absolute;top:584px;left:165px; width:100%"><img src="https://img.icons8.com/metro/26/000000/checkmark.png"/></div>';
    	}elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[3]){
    		$html .= '<div style="position:absolute;top:615px;left:165px; width:100%"><img src="https://img.icons8.com/metro/26/000000/checkmark.png"/></div>';
    	}
    	if($datapdf[0]->recruit_certificateEdu != ''){
    		$html .= '<div style="position:absolute;top:670px;left:120px; width:100%"><img src="https://img.icons8.com/metro/26/000000/checkmark.png"/></div>';
    	}
    	if($datapdf[0]->recruit_copyidCard != ''){
    		$html .= '<div style="position:absolute;top:670px;left:265px; width:100%"><img src="https://img.icons8.com/metro/26/000000/checkmark.png"/></div>';
    	}
    	if($datapdf[0]->recruit_copyAddress != ''){
    		$html .= '<div style="position:absolute;top:670px;left:455px; width:100%"><img src="https://img.icons8.com/metro/26/000000/checkmark.png"/></div>';
    	}
		$mpdf->SetDocTemplate('uploads/recruitstudent/pdf_registudent.pdf',true);

        $mpdf->WriteHTML($html);
        $mpdf->Output('Reg_'.$datapdf[0]->recruit_idCard.'.pdf','I'); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }



}