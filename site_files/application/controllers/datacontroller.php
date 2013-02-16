<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datacontroller extends CI_Controller {
	
	public function __construct()
       {
            parent::__construct();
            $this->load->helper('drop_down');
       }
			
	public function index()
	{
		$subdata = array(
			'heading' 		=> "Data",
			'menu'			=> $this->load->view('menu'),
			'exhibitors'	=> $this->data->get_exhibitors()
		);		
		$data['content'] = $this->load->view('data', $subdata, TRUE);
		$this->load->view('index', $data); 
	}	
	
	public function add_exhibitor_form()
	{
		$subdata = array(
			'heading' 		=> "Add",
			'menu'			=> $this->load->view('menu')			
		);		
		$data['content'] = $this->load->view('add_form', $subdata, TRUE);
		$this->load->view('index', $data); 
		
	}	
	
}
	