<div class="grid_12">
	<h2><?php echo $heading?></h2>
	<?php echo $menu?>
	<table cellpadding="0" cellspacing="0" border="0" id="example" width="100%" style="width: 100%;">
	<thead>
		<tr role="row">
			<th>Company</th>
			<th>Contact</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Details | Edit</th></tr>
	</thead>
	
	
	<tbody>
		<?php foreach($exhibitors as $data){
			
			echo '<tr>'
					,'<td>'.$data['organization'].'</td>'
					,'<td>'.$data['fname'].' '.$data['lname'].'</td>'
					,'<td>'.$data['phone'].'</td>'
					,'<td>'.$data['email'].'</td>'
					,'<td>'.$data['email'].'</td>'
				,'</tr>';
			
		}?>
	</tbody>
	
	</table>

</div>