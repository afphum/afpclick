<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
			
	public function index()
	{
		$subdata = array(
			'heading' 	=> "Login",
			'menu'		=> ""
		);		
		$data['content'] = $this->load->view('login_form', $subdata, TRUE);
		$this->load->view('index', $data); 
	}		
	
}
	