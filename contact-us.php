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
	
	?>
	
	<div class="container">
		<div class="row pt-3 pb-3">
			<h1>Contact us</h1>
		</div>
	</div>
	<div class="container pt-3">
		<div class="row">
			<form action="add-contact-data.php" name="form" id="form" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<label for="contact-name">Contact Name</label>
					<input type="text" class="form-control" id="contact-name" name="contact-name">
				</div>
				<div class="form-group">
					<label for="contact-email">Contact Email</label>
					<input type="mail" class="form-control" id="contact-email" name="contact-email">
				</div>
				<div class="form-group">
					<label for="contact-detail">Contact Detail</label>
					<textarea type="text" class="form-control" name="contact-detail" rows="4" id="contact-detail"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Save</button>
			</form>
		</div>
	</div>
	
	<script>
		function validateForm(){
			var	contactName = document.getElementById("contact-name").value.trim();
			var contactDetail = document.getElementById("contact-email").value.trim();
			var contactEmail = document.getElementById("contact-detail").value.trim();
			
			if	(contactName === "" || contactDetail === "" || contactDetail === ""){
				alert ("Please fill all fields");
				return false;
			}
			return true;
		}
		
		document.getElementById("form").addEventListener("submit", function(event){
			if	(!validateForm()){
				event.preventDefault();
			}
		});
	</script>
</body>
</html>