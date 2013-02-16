<div>
	<h2>Change Password</h2>
	<p><?php echo $result?></p>
	<?php 
	echo validation_errors();
	$attr = 'id="change_password_form"';
	echo form_open('change_password', $attr);
	echo form_label('New Password').form_password('new_password').br(2);
	echo form_label('Re-enter Password').form_password('re-enter_password').br(2);
	echo form_submit('submit','Submit');
	echo form_close();
