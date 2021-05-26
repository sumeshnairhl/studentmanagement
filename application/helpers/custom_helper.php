<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendemail')){
   function sendemail($email,$subject,$message){
         $ci =& get_instance();

      // Configure email library
       $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $ci->load->library('email', $config);
        $ci->email->set_newline("\r\n");
        $ci->email->from('sumeshnair1991@gmail.com', 'admin');
        $ci->email->to($email);
        $ci->email->subject($subject);
        $message = $message;
        $ci->email->message($message);
        $ci->email->send();
        //show_error($this->email->print_debugger());

   }
}
