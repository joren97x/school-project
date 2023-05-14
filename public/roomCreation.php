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
		h1 {
        color: #5c5c5c;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 2rem;
      }
      
      label {
        font-weight: 600;
        font-size: 1.2rem;
        color: #a8a8a8;
      }
      
      .form-control:focus {
        box-shadow: none;
        border-color: #ff7f50;
      }
      
      textarea {
        resize: none;
      }
      
      .btn-primary {
        background-color: #ff7f50;
        border-color: #ff7f50;
      }
      
      .btn-primary:hover {
        background-color: #ff704d;
        border-color: #ff704d;
      }
	</style>
</head>
<body class="bg-light">

		<?php require "navbar.php"; ?>
	
	<div class="container text-center " style="margin-top: 120px">
    <h1>Create New Guest House</h1>
      <div class="form-group">
        <label for="roomName" class="mb-2">Room Name</label>
        <input type="text" class="form-control rounded-pill" id="roomName" name="roomName" required>
      </div>
	  <div class="form-group">
        <label for="roomImg" class="mb-2">Room Image</label>
        <input type="file" class="form-control rounded-pill" id="roomImg" name="roomImg" required multiple>
      </div>
      
      <div class="form-group">
        <label for="roomDetails" class="mb-2">Room Description</label>
        <textarea class="form-control rounded" id="roomDetails" name="roomDetails" rows="3" required></textarea>
      </div>
      
	  <div class="form-group">
        <div class="row">
			<div class="col-6">
				<label for="roomNo" class="mb-2">Room Type</label>
				<select class="form-control rounded-pill" id="roomNo" name="roomNo" required>
          <option value="">Select Room Number</option>
          <option value="1">Single</option>
          <option value="2">Double</option>
        </select>
			</div>
			<div class="col-6">
				<label for="room_img" class="mb-2">Room Price</label>
				<input type="text" class="form-control rounded-pill" id="roomPrice" name="roomPrice" required>
			</div>
		</div>
      </div>
	  <div class="form-group">
        <div class="row">
			<div class="col-6">
				<label for="roomLocation" class="mb-2">Room Location</label>
				<input type="text" class="form-control rounded-pill" id="roomLocation" name="roomLocation" required>
			</div>
			<div class="col-6">
				<label for="roomLink" class="mb-2">Room Link</label>
				<input type="text" class="form-control rounded-pill" id="roomLink" name="roomLink" required>
			</div>
		</div>
      </div>
      <div class="form-group text-center mt-4">
        <button type="submit" class="btn btn-primary rounded-pill px-5 py-3" id="createRoom" name="createRoom">Create Room</button>
      </div>
	  
  </div>

	<?php require_once "footer.html" ?>

</body>
<script src="./jquery.js"></script>
<script src="./roomCreation.js"></script>
</html>
