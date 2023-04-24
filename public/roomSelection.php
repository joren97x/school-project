

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Room Selection</title>
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
			max-width: 1200px;
			padding: 20px;
		}

		/* room styles */
		.room {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			margin-top: 20px;
		}

		/* room card styles */
		.room-card {
			background-color: white;
			border: 1px solid #dddddd;
			border-radius: 5px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
			flex-basis: calc(33.33% - 20px);
			margin-bottom: 20px;
			padding: 20px;
		}

		.room-card:hover {
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
			transform: translateY(-5px);
			transition: all 0.3s ease;
		}

		 /* room image styles */
		.room-img {
			height: 200px;
			margin-bottom: 10px;
			object-fit: cover;
			width: 100%;
		}

		/* room name styles */
		.room-name {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		/* room description styles */
		.room-desc {
			font-size: 14px;
			margin-bottom: 10px;
		}

		/* room price styles */
		.room-price {
			font-size: 18px;
			font-weight: bold;
			margin-top: 10px;
		}

		/* room book button styles */
		.room-book {
			background-color: #0077b6;
			border: none;
			border-radius: 5px;
			color: white;
			cursor: pointer;
			font-size: 16px;
			padding: 10px 20px;
			margin-top: 10px;
			transition: all 0.3s ease;
		}

		.room-book:hover {
			background-color: #005f8b;
		}

	</style>
</head>
<body>
	<header>
		<h1>Guest Rooms</h1>
	</header>
	<div class="container">
		<div class="room">
			<div class="room-card">
				<img class="room-img" src="https://via.placeholder.com/500x300.png?text=Room+Image" alt="Room Image">
				<div class="room-name">Standard Room</div>
				<div class="room-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus auctor malesuada tellus.</div>
				<div class="room-price">P 10,000 </div>
				
            </div>
        </div>
    </div>
	<div class="roomDiv" id="roomDiv" name="roomDiv">

	</div>
	
</body>
<script src="jquery.js"></script>
<script src="roomSelection.js"></script>
</html>