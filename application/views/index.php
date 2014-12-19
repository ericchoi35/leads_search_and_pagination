<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ajax Form</title>
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change', 'form', function(){

			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					$('#leads').html(data);
				}
			);
			return false;
		});

		$(document).on('click', 'a', function(){
			console.log($(this).text());
			var page = $('#page').attr('value', $(this).text());
			console.log(page);
			$.post(
				$(this).attr('href'),
				$(this).serialize(),
				function(data){
					$('#leads').html(data);
					console.log(data);
				}
			);
			return false;
		});
	});
</script>

</head>
<body>
<div class="container">
	<h1>Ajax Form</h1>
	<div class='row'>
		<form role="form" action='/leads/search' method='post'>
		  	<div class="form-group col-sm-3">
		    	<label>Name</label>
		    	<input type="text" name="name" class="form-control">
		  	</div>
		  	<div class="form-group col-sm-3">
		    	<label>Email</label>
		    	<input type="text" name="email" class="form-control">
		  	</div>
		  	<div class="form-group col-sm-3">
		    	<label>From</label>
		  		<input type="date" name="date_from" class="form-control">
		  	</div>
		  	<div class="form-group col-sm-3">
		    	<label>To</label>
		  		<input type="date" name="date_to" class="form-control">
		  	</div>
		  	<input id='page' type='hidden' name='page' value=''>
		  	<!-- <button type="submit" class="btn btn-default">Search</button> -->
		</form>
	</div>
	<div id='leads'>
		<div class='row'>
			<ul class='pull-right pagination'>
<?php 		for($i = 0; $i < $pages; $i++)
			{	?>
				<li><a href='/leads/pages/<?= $i ?>'><?= $i + 1 ?></a></li> 
<?php 		}	?>
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
<?php 		foreach($leads as $lead)
			{	?>
				<tr>
					<td><?= $lead['id'] ?></td>
					<td><?= $lead['first_name'] ?></td>
					<td><?= $lead['last_name'] ?></td>
					<td><?= date("F j, Y", strtotime($lead['created_at'])) ?></td>
					<td><?= $lead['email'] ?></td>
				</tr>
<?php		}	?>			
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>