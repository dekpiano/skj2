<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_recruitstudent extends CI_Controller {
	
	var  $title = "การรับสมัคร";
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/Admin_model_recruitstudent');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}


	public function report_student()
	{		
		$chart_re1 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
		tb_recruitstudent.recruit_regLevel, 
		tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_regLevel',1)
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_re4 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel, 
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_regLevel',4)
				->group_by('recruit_tpyeRoom')

				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_All = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel, 
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->group_by('recruit_tpyeRoom')					
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$data['chart_1'] = json_encode(array_column($chart_re1,'C_count'));	
			$data['chart_4'] = json_encode(array_column($chart_re4,'C_count'));
			$data['chart_All'] = json_encode(array_column($chart_All,'C_count'));
			
			return $data;
	}
	

	public function index()
	{	
		$data = $this->report_student();

		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_recruitstudent');
		$this->db->order_by('recruit_id','DESC');
		$data['recruit'] =	$this->db->get()->result();
		
		$data['chart_1'];
		$data['chart_4'];
		$data['chart_All'];
			

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/recruitstudent/admin_recruitstudent_main.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function add()
	{
		$data = $this->report_student(); 
		$data['chart_1'];
		$data['chart_4'];
		$data['chart_All'];
		$data['title'] = $this->title;
		$data['icon'] = '<i class="far fa-plus-square"></i>';
		$data['color'] = 'primary';
		$data['breadcrumbs'] = array(base_url('admin/recruitstudent') => 'จัดการข้อมูล'.$this->title,'#' =>'เพิ่มข้อมูล'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		

		$this->db->select('*');
		$this->db->from('tb_recruitstudent');
		$this->db->order_by('recruit_id','DESC');
		$data['recruit'] =	$this->db->get()->result();
		
		$num = @explode("_", $data['recruit'][0]->recruit_id);
        $num1 = @sprintf("%03d",$num[1]+1);
        $data['recruitstudent'] = 'posi_'.$num1;
        $data['action'] = 'insert_recruitstudent';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/recruitstudent/admin_recruitstudent_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function insert_recruitstudent()
	{
		$data = array(	'recruit_id' => $this->input->post('recruit_id'),
						'posi_name' => $this->input->post('posi_name')
					);
		if($this->Admin_model_recruitstudent->recruitstudent_insert($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'บันทึกข้อมูลสำเร็จ'));
			redirect('admin/recruitstudent', 'refresh');
		}

		
	}

	public function edit_recruitstudent($id)
	{
		$data = $this->report_student(); 
		$data['chart_1'];
		$data['chart_4'];
		$data['chart_All'];
		/* Bread crum */
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/recruitstudent') => 'จัดการ'.$this->title,'#' =>'แก้ไข'.$this->title );
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->db->select('*');
		$this->db->from('tb_recruitstudent');
		$this->db->where('recruit_id',$id);
		$data['recruit'] =	$this->db->get()->result();
		$data['action'] = 'update_recruitstudent';

		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/recruitstudent/admin_recruitstudent_form.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function update_recruitstudent1()
	{
		$data = array(	
						'posi_name' => $this->input->post('posi_name')
					);
		if($this->Admin_model_recruitstudent->recruitstudent_update($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'แก้ไขข้อมูลสำเร็จ'));
			redirect('admin/recruitstudent', 'refresh');
		}
	}

	public function delete_recruitstudent($data)
	{
		if($this->Admin_model_recruitstudent->recruitstudent_delete($data) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/recruitstudent', 'refresh');
		}
	}


	public function update_recruitstudent($id,$img)
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
			'recruit_address' => $this->input->post('recruit_address'),
			'recruit_tpyeRoom' => $this->input->post('recruit_tpyeRoom'),							
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

			
		redirect('admin/control_admin_recruitstudent/edit_recruitstudent/'.$id);
			
		
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
				$data = array('upload_data' => $this->upload->data());
				// print_r($data);
				@unlink("./uploads/recruitstudent/m".$this->input->post('recruit_regLevel').'/'.$foder.'/'.$img);

				
				
				if($this->Admin_model_recruitstudent->recruitstudent_update($data_update,$id) == 1){
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

			if($this->Admin_model_recruitstudent->recruitstudent_update($data_update,$id) == 1){
					$this->session->set_flashdata(array('msg'=> 'NO','messge' => 'แก้ไขข้อมูลสำเร็จ'));
					//redirect('RegStudent/checkRegister?search_stu='.$this->input->post('recruit_idCard'), 'refresh');
			
			}
		}
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

?>