<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AFP Advertiser Report</title>
		<link type="text/css" href="./css/style.css" rel="stylesheet" />
	</head>
	<body>
		<div id="login">
			<img src="../../images/footer_logo.png" />
			<?php
				echo br(2);
				echo validation_errors();
				echo $login_error;
				echo form_open('login');
				echo form_label('Username').form_input('username').br();
				echo form_label('Password').form_password('password').br();
				echo form_submit('submit', 'Submit');
				echo form_close();
			?>
		</div>
		
	</body>
</html>