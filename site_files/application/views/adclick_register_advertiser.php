<div id="register">
<h2>Register an Advertiser</h2>	
	<?php
		echo $result;
		$attr = 'id="register_form"';
		echo form_open('register', $attr);
		echo form_label('Advertisers Name').form_input('advertiser_name').br();
		echo form_label('Advertisers URL http://').form_input('advertiser_url').br();
		echo form_label('Campaign').form_dropdown('campaign',$campaigns).br();
		echo form_submit('submit', 'Submit');
		echo form_close();
	?>
</div>