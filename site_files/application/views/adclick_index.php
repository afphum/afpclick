<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AFP Advertiser Report</title>
		<script type="text/javascript" src="../js/jquery-latest.js"></script>
		<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/adclick.js"></script>
		<script type="text/javascript" src="../js/jquery-editInPlace-v2.2.1/lib/jquery.editinplace.js"></script>
		<script type="text/javascript" src="../js/jquery-validation-1.9.0/jquery.validate.min.js"></script>
		<link type="text/css" href="../../css/style.css" rel="stylesheet" />
		<link type="text/css" href="../../css/jquery-ui-1.8.14.custom.css" rel="stylesheet" />
	</head>
	<body>
		<div class="wrapper">
			<!-- MENU (floats left) -->
			<div id="menu">
<img src="../../images/footer_logo.png" /><br /><br />
Hi <?php echo $this->session->userdata('name').br()?>				
				<ul>
					<li onclick="javascript: window.location = '/report'">Generate Report</li>
					<li onclick="javascript: window.location = '/register_form'">Register an Advertiser</li>
					<li onclick="javascript: window.location = '/register_campaign'">Register a Campaign</li>
					<li onclick="javascript: window.location = '/list_advertisers'">List Advertisers</li>
					<li onclick="javascript: window.location = '/list_campaigns'">List Campaigns</li>
					<li><hr></li>
					<li onclick="javascript: window.location = '/change_password'">Change Password</li>
					<li id="logout" onclick="javascript: window.location = 'logout'">Logout</li>
				</ul>
			</div>
			
			<!-- CONTENT (floats left) -->
			<div id="content">
				<?php echo $content?>		
			</div>
		</div>
	</body>
</html>
