<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
		$where=array('delete_status'=>0);
		$userdetail['listing']=$this->common->gettableslistwhere('student',$where,'id','desc');
		$this->load->view('dashboardlayouts/header');
		$this->load->view('student/index',$userdetail);
		$this->load->view('dashboardlayouts/footer');
	}

	public function add(){

				$this->load->helper(array('form'));
				$this->load->helper('email');


        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('Dept', 'Department', 'required');

 		$this->load->view('dashboardlayouts/header');
 		 if ($this->form_validation->run() == FALSE)
        	{
        		$this->load->view('student/add');
        	}
        	else
        	{
        		
					$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'Dept' => $this->input->post('Dept'),
					'updated_date'=>date('Y-m-d H:i:s')
					);
					 if(!empty($this->input->post('id'))){
					 	$this->session->set_flashdata('successreg', 'Student record updated successfully');
                    $wherearray = array('id' =>$this->input->post('id'));
                    $this->common->updaterecord($wherearray,$data,"student");
					 }else{
					 	$this->common->insert_entry("student",$data);
						$this->session->set_flashdata('successreg', 'Student record added successfully');	
					 }
				
        		redirect('student');
        	}
		
		$this->load->view('dashboardlayouts/footer');

	}

	 public function update($id){
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $where_sett=array('id'=>$id);
        $details['studentdet']=$this->common->getspecificrow('student',$where_sett);
        $this->load->view('dashboardlayouts/header');
        $this->load->view('student/add',$details);
        $this->load->view('dashboardlayouts/footer');
    }

	public function delete($id){

		$wherearray = array('id' => $id);
		$data = array(
					'delete_status'=>1,
					'updated_date'=>date('Y-m-d H:i:s')
					);
		$this->common->updaterecord($wherearray,$data,"student");
		$this->session->set_flashdata('successreg', 'Student record deleted successfully');
		redirect('student');
	}

}