<div>
	<h2>Campaigns</h2>
	<?php echo $pagination?>
		<table cellpadding="5" class="stripeme">
			<tr>
				<th>ID</th>
				<th>Campaign Name</th>
				<th>Campaign Description</th>
				<th>Date Registered</th>
				<th>Registered By</th>
				<th>Date Updated</th>
				<th>Updated By</th>
			</tr>
			<tr><td colspan="7"><hr></td></tr>
			<?php
				foreach($campaigns as $data)
				{?>
					<tr>
						<td><?php echo $data['campaign_id']?></td>
						<td class="editcampaignname" id="<?php echo $data['campaign_id']?>"><?php echo $data['campaign_name']?></td>
						<td class="editdescription" id="<?php echo $data['campaign_id']?>"><?php echo $data['campaign_description']?></td>
						<td><?php echo $data['date_created']?></td>
						<td><?php echo $data['created_by']?></td>
						<td><?php echo $data['date_updated']?></td>
						<td><?php echo $data['updated_by']?></td>
					</tr>	
			<?php 
				}?>
		</table>
	<p>Click on campaign name / description to edit.</p>
</div>