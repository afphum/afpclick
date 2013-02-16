<?php

class Modeladclicks extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_all_advertisers($limit='')
	{
		$qry = $this->db->query("select * from adclick_advertisers order by advertiser_name ".$limit);
		return $qry->result_array();		
	}
	
	function get_advertiser_data($advertiser_id='')
	{
		$id = $advertiser_id != '' ? $advertiser_id : $this->uri->segment(2);
		$qry = $this->db->where('advertiser_id', $id)->get('adclick_advertisers');
		return $qry->row_array();		
	}
	
	function get_all_campaigns($limit='')
	{
		$qry = $this->db->query("select * from adclick_campaigns order by campaign_name ".$limit);
		return $qry->result_array();				
	}
	
	/**
	 * used for dd in register advertisers form
	 */
	function get_campaigns()
	{
		$qry = $this->db->get('adclick_campaigns');
		if($qry->num_rows > 0)
		{
			$res[''] = 'Select';
			$res = $qry->result_array();
			return $res;
		}
		else {
			return array(''=>'No Campaigns');
		}
	}
	
	
	function register_click()
	{
		$data = array(
			'ip_address' =>  $_SERVER["REMOTE_ADDR"],
			'advertiser_id' => $this->uri->segment(2)
		);
		$this->db->insert('adclick', $data);
	}
	
	function report_generator($limit='')
	{
			$query 	= '(a.date_time >= "'.$_POST['date_from'].'" and a.date_time <= "'.$_POST['date_to'].'")';
			$datefrom 	= new DateTime($_POST['date_from']);	
			$dateto 	= new DateTime($_POST['date_to']);	
			$display_period = $datefrom->format('F d, Y'). ' to ' .$dateto->format('F d, Y');
		
		$qry = $this->db->query('select * from adclick a, adclick_advertisers aa where a.advertiser_id='.$_POST['advertiser_id'].' and '.$query.' and a.advertiser_id=aa.advertiser_id order by a.date_time '.$limit);
		$result = $qry->result_array();
		return array('report_data' => $result, 'display_period' => $display_period);		
	}
	
	function login()
	{
		$qry = $this->db->where('username', $_POST['username'])->where('password', md5($_POST['password']))->get('login');
		if($qry->num_rows() == 0)
		return FALSE;
		else
		return $qry->row_array();
	}
	
	function register_login()
	{
		$username = $_POST['username'];
		$date = date('Y-m-d H:i:s', time());
		$this->db->query('update login set last_login="'.$date.'" where username="'.$username.'"');
	}
}