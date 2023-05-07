<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Create New Guest House</title>
	<style>
		/* basic styles */
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		/* header styles */
		header {
			padding: 20px;
			text-align: center;
		}

		/* container styles */
		.container {
			margin: 0 auto;
			max-width: 800px;
			padding: 20px;
		}

		/* form styles */
		.form {
			background-color: white;
			border: 1px solid #dddddd;
			border-radius: 5px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
			padding: 20px;
		}

		/* form label styles */
		/* label {
			display: block;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: bold;
		} */

		/* form input styles */
		input[type="text"],
		input[type="number"],
		select {
			padding: 10px;
			width: 100%;
			border: 1px solid #cccccc;
			border-radius: 5px;
			margin-bottom: 20px;
			font-size: 16px;
		}

		/* form submit button styles */
		

		button[type="submit"]:hover {
			background-color: #005f8b;
		}
	</style>
</head>
<body class="bg-warning">

		<?php require "navbar.php"; ?>
	
	<header>
		<h1>Create New Guest House</h1>
	</header>

	<div class="container">

        <div class="form">

            <label for="room-name" class="h5">Room Image:</label>
            <br>
			<input type="file" id="roomImg" name="roomImg" required multiple>
		<br>
			<label for="room-name" class="h5">Room number:</label>
            <select  id="roomNo">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>

			<label for="room-name" class="h5">Room Name:</label>
			<input type="text" id="roomName" name="roomName" required>

            <label for="room-description" class="h5">Room Description:</label>
			<textarea id="roomDetails" name="roomDetails" class="form-control w-100" required></textarea>

			<label for="room-name" class="h5">Room Location:</label>
			<input type="text" id="roomLocation" name="roomLocation" required>

			<label for="room-name" class="h5">Link:</label>
			<input type="text" id="roomLink" name="roomLink" required>

			<label for="room-price" class="h5">Room Price:</label>
			<input type="number" id="roomPrice" name="roomPrice" required>

			

			<button class="btn btn-success form-control" name="createRoom" id="createRoom">Create Guest House</button>
        </div>

	</div>

	<?php require_once "footer.html" ?>

</body>
<script src="./jquery.js"></script>
<script src="./roomCreation.js"></script>
</html>
