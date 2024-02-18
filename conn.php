<?php
$conn = new mysqli("localhost", "root", "", "db_travel");
if($conn -> connect_error){
	die("Connect Error:" . $conn -> connect_error);
}
?>