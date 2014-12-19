<div class='row'>
	<ul class='pull-right pagination'>
<?php 	for($i = 0; $i < $pages; $i++)
		{	?>
		<li><a href='/leads/pages/<?= $i ?>'><?= $i + 1 ?></a></li>
<?php 	}	?>
	</ul>
</div>
<div class='row'>
	<table class='table table-striped'>
		<thead>
			<tr>
				<th>Leads ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Registered Date Time</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
<?php 	foreach($leads as $lead)
		{	?>
			<tr>
				<td><?= $lead['id'] ?></td>
				<td><?= $lead['first_name'] ?></td>
				<td><?= $lead['last_name'] ?></td>
				<td><?= date("F j, Y", strtotime($lead['created_at'])) ?></td>
				<td><?= $lead['email'] ?></td>
			</tr>
<?php	}	?>			
		</tbody>
	</table>
</div>