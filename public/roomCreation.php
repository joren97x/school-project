<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Create New Room</title>
	<style>
		/* basic styles */
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		/* header styles */
		header {
			background-color: #0077b6;
			color: white;
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
		label {
			display: block;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: bold;
		}

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
		button[type="submit"] {
			background-color: #0077b6;
			border: none;
			border-radius: 5px;
			color: white;
			cursor: pointer;
			font-size: 16px;
			padding: 10px 20px;
			margin-top: 20px;
			transition: all 0.3s ease;
		}

		button[type="submit"]:hover {
			background-color: #005f8b;
		}
	</style>
</head>
<body>
	<header>
		<h1>Create New Room</h1>
	</header>
	<div class="container">

        <div class="form">

            <label for="room-name">Room Image:</label>
            <input type="file" id="roomImg" name="roomImg" required multiple>

			<label for="room-name">Room Name:</label>
			<input type="text" id="roomName" name="roomName" required>

            <label for="room-description">Room Description:</label>
			<textarea id="roomDetails" name="roomDetails" class="form-control" style="padding: 50px; padding-right: 350px;" required></textarea>

			<label for="room-price">Room Price:</label>
			<input type="number" id="roomPrice" name="roomPrice" required>

			

			<button class="btn btn-success" name="createRoom" id="createRoom">Create Room</button>
        </div>

	</div>
</body>
<script src="./jquery.js"></script>
<script src="./roomCreation.js"></script>
</html>
