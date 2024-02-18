<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel</title>
<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>
</head>

<body>
	<?php
	
	require_once 'nav.php';
	require_once 'conn.php';
	?>
	
	<div class="container pt-3">
		<a href="add-attraction.php" class="btn btn-primary">Add Attraction</a>
	</div>
	<div class="container pt-3">
		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col" style="width: 10%">Edit</th>
						<th scope="col" style="width: 10%">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					$sql = "SELECT * FROM attraction";
					$result = $conn -> query($sql);
					if($result -> num_rows > 0){
						while($row = $result -> fetch_assoc()){
							echo '<tr>';
							echo '<th scope="row">'.$row["id"].'</th>';
							echo '<td>'.$row["name"].'</td>';
							echo '<td><a href="edit-attraction.php?id='.$row["id"].'" class="btn btn-primary">Edit</a></td>';
							echo '<td><a href="delete-attraction.php?id='.$row["id"].'" class="btn btn-danger">Delete</a></td>';
							echo '</tr>';
						}
					}
					
					?>
				</tbody>
			</table>
		</div>
	</div>	
</body>
</html>