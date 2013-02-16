<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AFP Advertiser Report</title>
		<script type="text/javascript" src="../js/jquery-latest.js"></script>
		<script type="text/javascript" src="../js/adclick.js"></script>
		<script type="text/javascript" src="../js/jquery-validation-1.9.0/jquery.validate.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#menu-advertiser").click(function(){
					$("#register").show();
					$('#report').hide()
				});
				$("#menu-report").click(function(){
					$("#report").show();
					$('#register').hide()
				});			
				$("#logout").css('cursor', 'pointer').click(function(){
					window.location = '/logout';
				});
				$("#register_form").validate({
					rules: {
						advertiser_name: "required",
						advertiser_url: "required"
					}
				});
			});
			
			function direct()
			{
				
			}
		</script>
		<link type="text/css" href="../../css/style.css" rel="stylesheet" />
	
	</head>
	<body>
		<div class="wrapper">
			
			<div id="menu">
				<img src="../../images/footer_logo.png" />
				<ul>
					<li id="menu-report" onclick="javascript: void(); window.location = '/report';">Generate Report</li>
					<li id="menu-advertiser">Register an Advertiser</li>
					<li id="logout">Logout</li>
				</ul>
			</div>
			
			<div id="report">
			<h2>Advertiser Report</h2>
				<?php
					echo form_open('generate');
					echo form_hidden('advertiser_id', $advertiser_id);
					echo form_hidden('generate', TRUE);
					echo form_label('Advertiser').nbs(2).form_dropdown('advertiser_id',$advertisers).nbs(2);
					echo form_label('Month').nbs(2).form_dropdown('month',$months).nbs(2).form_label('Year').nbs(2).form_input('year').nbs(2);
					echo form_submit('submit','Submit');
					echo form_close();
				if(isset($report_data))
				{
					if($num_results > 0)
					{
						$date = new DateTime($report_data[0]['date_time']);	
					?>		
					<h2>Report for: <?php echo $report_data[0]['advertiser_name']?> / <?php echo $date->format('F, Y')?> / Records: <?php echo $num_results?></h2>
					<table>
						<tr>
							<th>Date</th>
							<th>IP Address</th>
						</tr>
						<?foreach($report_data as $data)
						{?>
							<tr>
								<td><?php echo $data['date_time']?></td>							
								<td><?php echo $data['ip_address']?></td>							
							</tr>
						<?php }?>					
					</table>
			<?php }
				else
					{
						echo '<div style="color: red"> There are no records</div>';		
					}
			}
			echo br(2).$success;
			?>
			</div>
			
			<div id="register">
			<h2>Register an Advertiser</h2>	
				<?php
				$attr = 'id="register_form"';
					echo form_open('register', $attr);
					echo form_label('Advertisers Name').form_input('advertiser_name').br();
					echo form_label('Advertisers URL http://').form_input('advertiser_url').br();
					echo form_submit('submit', 'Submit');
					echo form_close();
				?>
			</div>
			
		</div>
	</body>
</html>

