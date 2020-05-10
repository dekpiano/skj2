<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin extends CI_Controller {
var  $title = "แผงควบคุม";
	public function __construct() {
		parent::__construct();
		
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}

	}


	public function index()
	{
		$data['title'] = $this->title;
		$data['menu'] =	$this->db->get('tb_adminmenu')->result();
		$this->load->view('admin/layout/header.php',$data);
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/index.php');

		$this->load->view('admin/layout/footer.php');
	}

	public function news()
	{

		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/news/news_main.php');

		$this->load->view('admin/layout/footer.php');
	}


	public function login(){
		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/layout/navber.php');

		$this->load->view('admin/login.php');

		$this->load->view('admin/layout/footer.php');

	}


}

?>