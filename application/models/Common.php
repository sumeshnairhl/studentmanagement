<?php 
class Common extends CI_Model {

	public function insert_entry($table,$arraydata)
    {
       $this->db->insert($table, $arraydata);
           return $this->db->insert_id();

    }

    public function checkuser($email,$password)
    {
    	$wherearray = array('user_email' => $email, 'user_password' => $password,'user_role'=>'admin');

		$this->db->where($wherearray);
    	$queryresults = $this->db->get('users');   
    	$ret = $queryresults->row();
 		return $ret;
    }

     public function gettableslist($tablename,$columname,$ordername)
    {
        $this->db->from($tablename);
        $this->db->order_by($columname,$ordername);
        $queryresults = $this->db->get();   
        $ret = $queryresults->result_array();
        return $ret;
    }

    public function deleterec($tablename,$where)
    {
        $this->db->where($where);
        $this->db->delete($tablename);
    }

    public function gettableslistwhere($tablename,$where,$columname,$ordername)
    {
         $this->db->where($where);
         $this->db->from($tablename);
        $this->db->order_by($columname,$ordername);
        $queryresults = $this->db->get();   
        $ret = $queryresults->result_array();
        return $ret;
    }

    public function getspecificrow($tablename,$where)
    {
         $this->db->where($where);
         $this->db->from($tablename);
        $queryresults = $this->db->get();   
        $ret = $queryresults->row();
        return $ret;
    }

    public function updaterecord($where,$data,$tablename)
    {
       $this->db->where($where);
       $this->db->update($tablename,$data);
       return $this->db->affected_rows();
    }

}
?>