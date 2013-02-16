<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript" src="../js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
		<script src="../js/jquery-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#country").change(function(){
					var selcountry = $(this).val();
						$.post('/afp/chapters', { postcountry: selcountry }, function(data){
						 $('#chapters').html(data);
					});
				});
				$("input[name=president_content]").blur(function(){
					$("#board_member_message").show();
				})
			});
		</script>
		<script type="text/javascript">
			tinyMCE.init({
			  mode : "textareas"
			});
		</script>
		<style>
			label{width: 200px; color: #000; font-family: Arial; font-size: 14px; font-weight: bold; padding-right: 20px;}
		</style>
	</head>
	<body>		
		<div style="width: 960px; margin: 10px auto; font-family: Arial; font-size: 12px;">
			
			<div style="width: 200px; height: 800px; float: left;">Menu</div>
			
			<div style="width: 700px; float: left; border-left: 1px solid black; padding-left: 20px">
				<h1>AFP Email Content Manager</h1>
					<?php
					$heading = array(
						'style' => 'padding-right: 10px'
					);
					$js = 'id="country"';
						echo form_open('/afp/content_builder');
						echo form_label('Country','country').form_dropdown('country',array(''=>'Select','all'=>'All','Canada'=>'Canada','United States'=>'United States'),'', $js);
						?>
						<div id="chapters"></div>
					<?php
						echo br(2).form_label('General Content','general').br().form_label('Heading','', $heading).form_input('general_heading').br().form_textarea('general_content').br();
						echo form_label('Presidents Content','president').br().form_label('Heading','', $heading).form_input('president_heading').br().form_textarea('president_content').br();
						echo form_label('Board Member Content','board').'<div id="board_member_message">Do you want this content to appear along with the Presidents Content?</div>'.br().form_label('Heading','', $heading).form_input('board_heading').br().form_textarea('board_content').br();
						echo form_label('Renewal Notice Content','renewal').br().form_label('Renewal Date From:','', $heading).form_input('renewalfrom').nbs(3).form_label('Renewal Date To','', $heading).form_input('renewto').br().form_label('Heading').form_input('renewal_heading').br().form_textarea('renewal_content').br();
						echo form_label('Membership Anniversary Content','membership').br().form_label('DOB From:','', $heading).form_input('dobfrom').nbs(3).form_label('DOB To','', $heading).form_input('dobto').br().form_label('Heading','', $heading).form_input('membership_heading').br().form_textarea('membership_content').br();
						echo form_submit('submit', 'Submit');
						echo form_close();
					?>
		  </div>
		</div>
	</body>
</html>
