<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 		= "adclick";
$route['404_override'] 				= '';
$route['get_chapter'] 				= 'afprm/get_chapter';


/* ADCLICK ROUTES */
$route['adclick']					= 'adclick/index';
$route['login']						= 'adclick/index';
$route['logout']					= 'adclick/logout';

$route['generate/:any'] 			= 'adclick/report';
$route['generate/:any/:any'] 		= 'adclick/report';
$route['generate'] 					= 'adclick/report';
$route['report'] 					= 'adclick/report';

$route['register_form/success'] 	= 'adclick/register_advertiser_form';
$route['register_form']				= 'adclick/register_advertiser_form';
$route['register'] 					= 'adclick/register_advertiser';

$route['register_campaign/success'] = 'adclick/register_campaign_form';
$route['register_campaign']			= 'adclick/register_campaign_form';
$route['campaign'] 					= 'adclick/register_campaign';

$route['list_advertisers/:any']		= 'adclick/list_advertisers';
$route['list_advertisers']			= 'adclick/list_advertisers';

$route['list_campaigns/:any']		= 'adclick/list_campaigns';
$route['list_campaigns']			= 'adclick/list_campaigns';

$route['adclick/:num'] 				= 'adclick/register_click';

$route['change_password']			= 'adclick/change_password';


/* End of file routes.php */
/* Location: ./application/config/routes.php */