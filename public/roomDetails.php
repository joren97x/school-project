<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
	</script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Room Details</title>
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

		/* room details styles */
		.room-details {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			margin-top: 20px;
		}

		/* room details card styles */
		.room-details-card {
			background-color: white;
			border: 1px solid #dddddd;
			border-radius: 5px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
			flex-basis: calc(66.66% - 20px);
			margin-bottom: 20px;
			padding: 20px;
		}

		/* room details image styles */
		.room-details-img {
			height: 400px;
			object-fit: cover;
			width: 100%;
		}

		/* room details info styles */
		.room-details-info {
			flex-basis: calc(33.33% - 20px);
			padding: 20px;
		}

		/* room details name styles */
		.room-details-name {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		/* room details description styles */
		.room-details-desc {
			font-size: 14px;
			margin-bottom: 10px;
		}

		/* room details price styles */
		.room-details-price {
			font-size: 18px;
			font-weight: bold;
			margin-top: 10px;
		}

		/* room details book button styles */
		.room-details-book {
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

		.room-details-book:hover {
			background-color: #005f8b;
		}
	</style>
</head>

<body>
	<header>
		<h1>Room Details</h1>
	</header>
	<input type="hidden" value="<?php echo $_GET['room_id']; ?>" id="room_id">
	<div id="roomDetails">

	</div>
	<!-- CAROUSEL IMAGES -->
	<!-- <div class="container">
		<div class="row ">
			<div class="col-8 shadow  justify-content-around d-flex">
				<div id="carouselExampleFade" class="carousel slide carousel-fade w-100">
					<div class="carousel-inner">
						<div class="carousel-item active ">
							<img src="../images/wowRoom.png" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../images/room3.png" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../images/myRoom.png" class="d-block w-100" alt="...">
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<div class="col-4">
				HEllo world?
			</div>
		</div>
	</div> -->
	<!-- <div class="carousel-item">  
		<img src="../images/room3.png" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item"> 
		 <img src="../images/someRoom.png" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item"> 
		<img src="../images/wowRoom.png" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">  
		<img src="../images/" class="d-block w-100" alt="...">
	</div> -->


</body>
<script src="./jquery.js"></script>
<script src="./roomDetails.js"></script>

</html>