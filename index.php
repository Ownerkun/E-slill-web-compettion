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
	
	<div class="container-fluid">
		<center><img src="img/banner.jpg" alt="" class="img-fluid">
	</div>
	<div class="container pt-3">
		<div class="row">
			<div class="card-deck">
				<?php
				
				$sql = "SELECT * FROM attraction";
				$result = $conn -> query($sql);
				if($result -> num_rows > 0){
					while($row = $result -> fetch_assoc()){
						$img_sql = "SELECT * FROM image WHERE attraction_id =".$row['id']." LIMIT 1";
						$img_result = $conn -> query($img_sql);
						$img_path = '';
						if ($img_result -> num_rows > 0){
							$img_data = $img_result -> fetch_assoc();
							$img_path = $img_data['path'];
						}
						echo '<div class="card col-md-4" style="min-width: 18rem; max-width: 18rem;"> <img class="card-img-top" src="'.$img_path.'" alt="Card image cap">';
						echo '<div class="card-body">';
						echo '<h5 class="card-title">'.$row["name"].'</h5>';
						echo '<p class="card-text">'.$row["detail"].'</p>';
						echo '<a href="attraction-detail.php?id='.$row["id"].'" class="btn btn-primary">Go somewhere</a> </div>';
						echo '</div>';
					}
				}
				
				?>
            </div>
		</div>
	</div>	
</body>
</html>