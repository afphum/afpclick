<div>
	<h2>Advertisers</h2>
	<?php echo $pagination?>
		<table cellpadding="5" class="stripeme">
			<tr>
				<th>ID</th>
				<th>Advertisers Name</th>
				<th>Advertisers URL</th>
				<th>Date Registered</th>
				<th>Submitted By</th>
				<th>Date Updated</th>
				<th>Updated By</th>
			</tr>
			<tr><td colspan="7"><hr></td></tr>
			<?php
				foreach($advertisers as $data)
				{?>
					<tr>
						<td><?php echo $data['advertiser_id']?></td>
						<td class="editname" id="<?php echo $data['advertiser_id']?>"><?php echo $data['advertiser_name']?></td>
						<td class="editurl" id="<?php echo $data['advertiser_id']?>"><?php echo $data['advertiser_url']?></td>
						<td><?php echo $data['date_time']?></td>
						<td><?php echo $data['submitted_by']?></td>
						<td><?php echo $data['date_updated']?></td>
						<td><?php echo $data['updated_by']?></td>
					</tr>	
			<?php 
				}?>
		</table>
	<p>Click on advertisers name / url to edit.</p>
</div>