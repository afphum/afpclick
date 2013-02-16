<div class="span-10"">
<?php
	
	echo form_open('add_exhibitor', array('id'=>'add_form'));
	echo form_label('Organization', 'organization').form_input(array('name'=>'organization','id'=>'organization')).br();
	echo form_label('Address 1', 'address1').form_input(array('name'=>'address1','id'=>'address1')).br();
	echo form_label('Address 2', 'address2').form_input(array('name'=>'address2','id'=>'address2')).br(2);
	echo form_label('City', 'city').form_input(array('name'=>'city','id'=>'city')).br(2);
	$country_attributes = 'id="country" onChange="get_province_state();"';
	echo form_label('Country', 'country').form_dropdown('country', getCountries('Select'), '', $country_attributes).br(2);
	echo '<div id="state_layer"></div>';
	echo form_label('Zip / Postal Code', 'zip').form_input(array('name'=>'zip','id'=>'zip')).br(2);
	echo form_label('Contact First Name', 'fname').form_input(array('name'=>'fname','id'=>'fname')).br(2);
	echo form_label('Contact Last Name', 'lname').form_input(array('name'=>'lname','id'=>'lname')).br(2);
	echo form_label('Phone', 'phone').form_input(array('name'=>'phone','id'=>'phone')).br(2);
	echo form_label('Email', 'emaillname').form_input(array('name'=>'email','id'=>'email')).br(2);
	echo form_submit('submit','Submit');
	echo form_close(); 
?>	
</div>