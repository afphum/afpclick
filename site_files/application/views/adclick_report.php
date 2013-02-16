<div id="report">
<h2>Advertiser Report</h2>
	<?php
		$attr = 'id="report_form"';
		echo form_open('generate',$attr);
		echo form_hidden('advertiser_id', $advertiser_id);
		echo form_hidden('generate', TRUE);
		echo form_hidden('type');
		echo form_label('Advertiser').nbs(2).form_dropdown('advertiser_id',$advertisers).br();		
		echo '<p>'.form_label('From').nbs(2).form_input('date_from').'</p><p>'.form_label('To').nbs(2).form_input('date_to').br(2).form_submit('submit', 'Submit').br(3).'</p>';

		echo form_close();
	if(isset($report_data))
	{
		if($num_results > 0)
		{
			//echo $pagination;
			$date = new DateTime($report_data[0]['date_time']);	
		?>		
		<h2>Report for: <?php echo $report_data[0]['advertiser_name']?> / <?php echo $display_period ?> / Records: <?php echo $num_results?></h2>
		<table cellpadding="5" class="stripeme">
			<tr>
				<th>Date</th>
				<th>IP Address</th>
			</tr>
			<tr><td colspan="5"><hr></td></tr>
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
?>
</div>