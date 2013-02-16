<div id="register">
<h2>Register a New Campaign</h2>	
	<?php
		echo $result;
		$attr = 'id="campaign_form"';
		echo form_open('campaign', $attr);
		echo form_label('Campaign Name').br().form_input('campaign_name').br();
		$attr = array('name'=>'campaign_description','rows'=>"5", 'cols'=>"40");
		echo form_label('Description').br().form_textarea($attr).br(2);
		echo form_submit('submit', 'Submit');
		echo form_close();
	?>
</div>