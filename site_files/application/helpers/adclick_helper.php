<?php

function greeting()
{
	$ci = &get_instance();
	if(date('H') > '00' && date('H') < '12')
	{
		$response =  'Good Morning ';
	}
	elseif (date('H') > '12' && date('H') < '05') 
	{
		$response =  'Good Afternoon ';		
	}
	elseif (date('H') > '05' && date('H') < '08') 
	{
		$response =  'Good Evening ';		
	}	
	else {
		$response = 'Hello ';
	}
	return br(2).'HAL says '.br(2).'"'.$response.$ci->session->userdata('name').'"';
}