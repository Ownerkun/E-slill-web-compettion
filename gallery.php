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
		<div class="row">
			<div class="card-deck">
				<?php
				
				$sql = "SELECT * FROM image";
				$result = $conn -> query($sql);
				if($result -> num_rows > 0){
					while($row = $result -> fetch_assoc()){
						echo '<div class="card col-md-4" style="min-width: 18rem; max-width: 18rem;"> <a href="'.$row["path"].'" target="_blank"><img class="card-img-top" src="'.$row["path"].'" alt="Card image cap">';
						echo '</div>';
					}
				}
				
				?>
				<a href=""></a>
            </div>
		</div>
	</div>	
</body>
</html>