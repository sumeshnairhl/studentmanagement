<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('common');
		$this->load->model('usermodel');
		$this->load->helper('custom');
	}

	public function index()
	{
		$this->load->helper(array('form'));
		$this->load->helper('email');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emailuser', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('passworduser', 'Password', 'required');
	  
	  	if ($this->form_validation->run() == FALSE)
	        	{
					$this->load->view('login');
	            }
	            else
	            {
	            	$getuserdetail=$this->common->checkuser(strip_tags($this->input->post('emailuser')),md5(strip_tags($this->input->post('passworduser'))));
	            	if(count($getuserdetail)>0)
	            	{
	            		
	            		$the_session = array("id" =>$getuserdetail->user_id);
						$this->session->set_userdata($the_session);
	        			$this->session->set_flashdata('successreg', 'Welcome to the Student Application');
	            	    redirect('dashboard');
	            	}
	            	else
	            	{
	            		$this->session->set_flashdata('errorreg', 'Enter valid Username or Password');
	            		redirect('login');
	            	}
	            }

		$this->load->view('loginlayouts/header');
		
		$this->load->view('loginlayouts/footer');
	}

	public function forgotpassword(){
		$this->load->helper(array('form'));
		$this->load->helper('email');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emailuser', 'Email', 'trim|required|valid_email');
        $this->load->view('loginlayouts/header');
        if ($this->form_validation->run() == FALSE)
	        	{
					$this->load->view('forgotpwd');
	            }
	            else
	            {
	            	$getuserdetail=$this->usermodel->adminchangepasswordemail(strip_tags($this->input->post('emailuser')));

	            	if(isset($getuserdetail->user_id))
	            	{
	            		
	            		$digits = 10;
         			    $otp=rand(pow(10, $digits-1), pow(10, $digits)-1);
	        			$this->session->set_flashdata('successreg', 'Please check your email for credentials');
	            	    $data = array(
						
						'user_password'=>md5($otp),
						'updated_date'=>date('Y-m-d H:i:s')
						);
						$wherearray = array('user_id' => $getuserdetail->user_id);
						$this->common->updaterecord($wherearray,$data,"users");
						 $message = "Below is your password to login into your account! <br> $otp .";
					    sendemail(strip_tags($this->input->post('emailuser')),'Admin Forgot Password',$message);

	            	    redirect('login/forgotpassword');
	            	}
	            	else
	            	{
	            		$this->session->set_flashdata('errorreg', 'Enter valid Email Address');
	            		redirect('login/forgotpassword');
	            	}
	            }

	           $this->load->view('loginlayouts/footer');
	}
}
