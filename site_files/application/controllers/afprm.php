<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afprm extends CI_Controller {
	
	public function __construct()
       {
            parent::__construct();
       }
	   
	   function index()
	   {
	   		$qry = $this->db->query("select distinct chapter from members order by chapter");
			$result = $qry->result_array();
			$chapter['--'] = 'Select';
			$chapter['all'] = 'All';
			foreach($result as $res)
			{
				$chapter[$res['chapter']] = $res['chapter'];	
			}
			
			$data['chapter'] = $chapter;
	   		$this->load->view('content_form', $data);
	   }
	   
	   function chapters()
	   {
	   		if($_POST['postcountry'] != 'all')
	   			$qry = $this->db->query("select distinct chapter from members WHERE country='".$_POST['postcountry']."' order by chapter");
			else
				$qry = $this->db->query("select distinct chapter from members order by chapter");
			
			$result = $qry->result_array();
			$chapter['--'] = 'Select';
			$chapter['all'] = 'All';
			foreach($result as $res)
			{
				$chapter[$res['chapter']] = $res['chapter'];	
			}
			$content = '<label>Chapter</label><select name="chapters">';
			foreach($chapter as $key=>$val)
			{
				$content .= '<option value="'.$key.'">'.$val.'</option>';
			}
			$content .= '</select>';
			
			echo $content;	   	
	   }
	   
	   function content_builder()
	   {
	   	print_r($_POST);
	   }
	   
	   
}