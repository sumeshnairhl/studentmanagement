<?php 
class Usermodel extends CI_Model {


	public function checkuser($username,$password){

		$wherearray = array('user_email' => $username, 'user_password' => $password,'user_status'=>1,'user_delete'=>1);
		$this->db->select('user_id,first_name,last_name,user_image,user_email,user_verify');
		$this->db->where($wherearray);
		$this->db->where('user_role!=','admin');
    	$queryresults = $this->db->get('users');   
    	$ret = $queryresults->row();
 		return $ret;
	}

	public function getprofiledetails($userid){

		$wherearray = array('user_id' => $userid,'user_status'=>1,'user_delete'=>1);
		$this->db->select('user_id,first_name,last_name,user_image,user_email,user_verify');
		$this->db->where($wherearray);
		$this->db->where('user_role!=','admin');
    	$queryresults = $this->db->get('users');   
    	$ret = $queryresults->row();
 		return $ret;
	}

	public function adminchangepasswordemail($email){
		$wherearray = array('user_email' => $email,'user_status'=>1,'user_delete'=>1,'user_role'=>'admin');
		$this->db->where($wherearray);
		$queryresults = $this->db->get('users');   
    	$ret = $queryresults->row();
 		return $ret;
	}

	public function getactiveusers(){
		$wherearray = array('user_status'=>1,'user_delete'=>1);
		$this->db->select('user_id,firebase_token');
		$this->db->where($wherearray);
		$this->db->where('user_role!=','admin');
		$this->db->where('firebase_token!=',"");
		$queryresults = $this->db->get('users');   
    	$ret = $queryresults->result_array();
 		return $ret;
	}


}