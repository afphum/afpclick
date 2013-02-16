<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	public function __construct()
       {
            parent::__construct();
            $this->load->helper('drop_down');
       }
			
	public function ajax_get_province_state()
	{
		if($_POST['country'] == 'US')
		{
		  	$data = getStates();
		}
		elseif($_POST['country'] == 'CA') 
		{
			$data = getProvinces();
		}
		else {
			$data = '';
		}
		
		if($data != '')
		{
			$html = '<select name="state" id="state">';
			foreach($data as $key=>$val)
			{
				$html .= '<option value="'.$key.'">'.$val.'</option>';
			}
			$html .= '</select>';
		}
		else {
			$html = '';
		}
		echo $html;
				
	}
			
}