<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Room Selection</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}
		header {
			background-color: #0077b6;
			color: white;
			padding: 20px;
			text-align: center;
		}
	</style>
</head>
<body>
	<header>
		<h1>Guest Rooms</h1>
	</header>

	<?php require_once "navbar.php"; ?>
	
	<div class="container mt-5" >

		<div class="row" id="roomDiv" name="roomDiv">

		</div>

	</div>
	
</body>
<script src="jquery.js"></script>
<script src="roomSelection.js"></script>
</html>