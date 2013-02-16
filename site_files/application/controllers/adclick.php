<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adclick extends CI_Controller {
	
	public function __construct()
       {
            parent::__construct();
            $this->load->helper('drop_down');
			$this->load->model('modeladclicks');
			$this->load->library('session');
			$this->load->helper('logged');
			$this->load->helper('adclick');
			$this->output->enable_profiler(FALSE);
       }
	
	/**
	 * this function manages the login and either redirects
	 * to the report page or back to the login
	 */   
	public function index()
	{
		if($this->session->userdata('username') == FALSE)
		{	
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
	
			if ($this->form_validation->run() == FALSE)
			{
				$subdata['login_error'] = '';
				$this->load->view('login', $subdata);
			}
			else
			{
				$login = $this->modeladclicks->login();
				if($login != FALSE)
				{
					$this->session->set_userdata('username', $_POST['username']);
					$this->session->set_userdata('name', $login['name']);
					$this->session->set_userdata('user_id', $login['id']);
					$this->modeladclicks->register_login();
					redirect(base_url().'report');	
				}
				else
				{
					$subdata['login_error'] = '<p style="color: red">Invalid login, try again';
					$this->load->view('login', $subdata);					
				}
			}
		}
		else {
			redirect('report');
		}		
	}	
	
	/**
	 * registers the click through
	 */
	public function register_click()
	{
		$this->modeladclicks->register_click();
		$advertiser = $this->modeladclicks->get_advertiser_data();
		redirect($advertiser['advertiser_url']);		
	}
	
	/**
	 * builds the report form and generates the report 
	 */
	public function report()
	{
		logged_in();
		$subdata['months'] = array(
			''   => 'Select Month',
			'01' => 'Jan',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'May',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Aug',
			'09' => 'Sep',
			'10' => 'Oct',
			'11' => 'Nov',
			'12' => 'Dec',
		);
		
		$advert = $this->modeladclicks->get_all_advertisers();
		foreach($advert as $data)
		{
			$advertiser_array[$data['advertiser_id']] = $data['advertiser_name'];
		}		
		$subdata['advertisers'] = $advertiser_array;//FOR ADVERTISERS DROPDOWN
		
		if(isset($_POST['generate']) || $this->uri->segment(3))
		{						
			$subdata['advertiser_id'] = $_POST['advertiser_id'];// ? $_POST['advertiser_id'] : $this->uri->segment(3);//USED TO FILL HIDDEN FORM FIELD
			
			$limit = !$this->uri->segment(3) ? 'limit 0, 10' : 'limit '.$this->uri->segment(2).',10';
			
			$response = $this->modeladclicks->report_generator();//FROM REPORT QUERY
			$subdata['report_data'] 	= $response['report_data'];
			$subdata['display_period'] 	= $response['display_period'];
			$subdata['num_results'] 	= count($response['report_data']);//NUMBER OF RESULTS
			
			$subdata['pagination'] = $this->pagination('generate/'.$_POST['advertiser_id'], $subdata['num_results'], 10);				
		}
		else {
			$subdata['advertiser_id'] = $this->uri->segment(2);//USED THE FILL HIDDEN FORM FIELD
		}
		
		$data['content'] = $this->load->view('adclick_report',$subdata,TRUE);
		$this->load->view('adclick_index', $data);
	}

	/**
	 * buids the advertiser registration form
	 */
	public function register_advertiser_form()
	{
		logged_in();
		$subdata['result'] = '';
		$campaign_array[''] = 'Select';
		$campaigns = $this->modeladclicks->get_all_campaigns();
		foreach($campaigns as $data)
		{
			$campaign_array[$data['campaign_id']] = $data['campaign_name'];
		}			

		$subdata['campaigns'] = $campaign_array;
		$data['content'] = $this->load->view('adclick_register_advertiser',$subdata,TRUE);
		$this->load->view('adclick_index', $data);
	}

	/**
	 * registers the advertiser and sends an email to Nick and Steve with the link information
	 */
	public function register_advertiser()
	{
		$url = strpos($_POST['advertiser_url'], 'http://') != FALSE ? $_POST['advertiser_url'] : 'http://'.$_POST['advertiser_url'];
		
		$data = array(
			'advertiser_name' 	=> $_POST['advertiser_name'],
			'advertiser_url' 	=> $url,
			'submitted_by'		=> $this->session->userdata('username')
		);
		$ins = $this->db->insert('adclick_advertisers', $data);
		if($this->db->affected_rows() > 0)
		{
			if($_POST['campaign'] != '')
			{
				$dat = array('campaign_id' => $_POST['campaign'], 'advertiser_id' => $this->db->insert_id());
				$this->db->insert('adclick_advertisers_campaigns', $dat);
			}	
			$message = '<p>Advertiser Name: '.$name.br().'Advertiser URL: '.$url;
			$this->email('New Advertiser', $message);	
			$subdata['result'] = '<p>Thanks, the advertiser has been registered</p>';
		}
		else 
		{
			$subdata['result'] = '<p>I was unable to complete the transaction, please try again</p>';
		}
		$data['content'] = $this->load->view('adclick_register_advertiser', $subdata, TRUE);
		$this->load->view('adclick_index', $data);
	}
	
	function register_campaign_form()
	{
		logged_in();
		$subdata['result'] = '';
		$data['content'] = $this->load->view('adclick_register_campaign',$subdata,TRUE);
		$this->load->view('adclick_index', $data);		
	}
	
	function register_campaign()
	{
		$data = array(
			'campaign_name' => $_POST['campaign_name'],
			'campaign_description' => $_POST['campaign_description']			
		);
		$ins = $this->db->insert('adclick_campaigns', $data);
		if($this->db->affected_rows() > 0)
		{
			$subdata['result'] = '<p>Thanks, the campaign has been registered</p>';
		}
		else 
		{
			$subdata['result'] = '<p>I was unable to complete the transaction, please try again</p>';
		}
		$data['content'] = $this->load->view('adclick_register_campaign', $subdata, TRUE);
		$this->load->view('adclick_index', $data);		
	}

	/**
	 * generates a list of advertisers
	 */
	public function list_advertisers()
	{
		logged_in();
		//get advertisers
		$limit = !$this->uri->segment(2) ? 'limit 0, 10' : 'limit '.$this->uri->segment(2).',10';
		$num_advertisers = $this->modeladclicks->get_all_advertisers();
		$subdata['advertisers'] = $this->modeladclicks->get_all_advertisers($limit);
		
		//pagination
		$subdata['pagination'] = $this->pagination('list_advertisers', count($num_advertisers), 10);
		$data['content'] = $this->load->view('adclick_list_advertisers', $subdata, TRUE);
		$this->load->view('adclick_index', $data);				
	}
	
	public function list_campaigns()
	{
		logged_in();
		$limit = !$this->uri->segment(2) ? 'limit 0, 10' : 'limit '.$this->uri->segment(2).',10';
		$num_campaigns = $this->modeladclicks->get_all_campaigns();
		$subdata['campaigns'] = $this->modeladclicks->get_all_campaigns($limit);
		
		//pagination
		$subdata['pagination'] = $this->pagination('list_campaigns', count($num_campaigns), 10);
		$data['content'] = $this->load->view('adclick_list_campaigns', $subdata, TRUE);
		$this->load->view('adclick_index', $data);			
		
	}
	
	/**
	 * user can edit the Advertisers name and url using inline edit 
	 */
	public function update_advertiser()
	{
		$this->db->query("update adclick_advertisers set `".$_POST['field']."` = '".$_POST['update_value']."', `updated_by`='".$this->session->userdata('username')."', `date_updated` = '".date('Y-m-d H:i:s')."' where advertiser_id=".$_POST['element_id']);	
		echo $_POST['update_value'];
	}
	
	/**
	 * user can edit the Advertisers name and url using inline edit 
	 */
	public function update_campaign()
	{
		$this->db->query("update adclick_campaigns set `".$_POST['field']."` = '".$_POST['update_value']."', `updated_by`='".$this->session->userdata('username')."', `date_updated` = '".date('Y-m-d H:i:s')."' where campaign_id=".$_POST['element_id']);	
		echo $_POST['update_value'];
	}
	
	/**
	 * email function
	 */
	public function email($subject, $message)
	{
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('System');
		$this->email->to('mktsupport@afpnet.org'); 
		$this->email->to('NRicci@afpnet.org');
		
		$this->email->subject($subject);

		$this->email->message($message);	
		
		$this->email->send();
	}
	
	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('/login');
	}
	
	public function pagination($segment, $total_rows, $per_page)
	{
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().$segment.'/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page; 
		
		$this->pagination->initialize($config); 	
		
		return $this->pagination->create_links();		
	}
	
	function days_by_month()
	{
		$num_days = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);
		for($i=0; $i<=$days; $i++)
		{
			$days_array[$i] = $i;
		}
		echo $days_array();
	}
	
	function change_password()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');

		$this->form_validation->set_rules('new_password', 'Password', 'required|matches[re-enter_password');
		$this->form_validation->set_rules('re-enter_password', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$subdata['result'] = '';
			$data['content'] = $this->load->view('adclick_change_password', $subdata, TRUE);
			$this->load->view('adclick_index', $data);	
		}
		else
		{
			$this->db->query('update login set password = "'.md5($_POST['new_password']).'" where id='.$this->session->userdata('user_id'));
			$subdata['result'] = 'Your password has been changed';
			$data['content'] = $this->load->view('adclick_change_password', $subdata, TRUE);
			$this->load->view('adclick_index', $data);	
		}		
		
		
	}
	
				
}