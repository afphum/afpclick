<?php class Data extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function get_exhibitors()
	{
		$qry = $this->db->get('exhibitors');
		return $qry->result_array();
	}
}   