<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('common');

		if(empty($_SESSION['id']))
		{
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('dashboardlayouts/header');
		$this->load->view('dashboard/index');
		$this->load->view('dashboardlayouts/footer');
	}

	
	public function logout(){

		session_destroy();
		redirect('login');
	}
}