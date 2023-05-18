
  <?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Questrial&display=swap" rel="stylesheet">
  <style>
     body {
            font-family: 'Questrial', sans-serif;
        }
    a {
      text-decoration: none;
      color: black;
    }

    .navbar a {
      font-size: 18px;
      color: blue;
    }

    .img-fluid:hover {
      opacity: 0.8;
      cursor: pointer;
    }

    .rounded-left {
      border-top-left-radius: 15px;
      border-bottom-left-radius: 15px;
    }

    .rounded-bottom-right {
      border-bottom-right-radius: 15px;
    }

    .rounded-top-right {
      border-top-right-radius: 15px;
    }

    .overlay {
      position: fixed;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      display: none;
    }

    .fullscreen-img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 100%;
      max-height: 100%;
    }

    /* Style the close button */
    .close-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      color: white;
      font-size: 30px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <?php require "navbar.php"; ?>
  <div class="container mt-5" style="margin-bottom: 100px; padding-top: 70px">
    <div class="row mb-3">
      <h1 id="house_title">Guest House Title</h1>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <img src="" id="img0" onclick="openFullscreen(this)" class="img-fluid w-100 rounded-left ms-4" style="height: 360px;">
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="row">
          <div class="col-12">
            <img src="" id="img1" onclick="openFullscreen(this)" class="img-fluid object-fit-cover ms-2 w-100" style="height: 175px; margin-bottom: 5px;">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <img src="" id="img2" onclick="openFullscreen(this)" class="img-fluid object-fit-cover ms-2" style="height: 175px; margin-top: 5px;">
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="row">
          <div class="col-12">
            <img src="" id="img3" onclick="openFullscreen(this)" class="img-fluid object-fit-cover rounded-top-right w-100" style="height: 175px; margin-bottom: 5px;">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <img src="" id="img4" onclick="openFullscreen(this)" class="img-fluid object-fit-fill rounded-bottom-right w-100" style="height: 175px; margin-top: 5px;">
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="h4 text-dark">About this place</div>
        <div class="h6 mx-5 text-dark" id="house_desc">It is a long established fact that a reader will be distracted by the
          readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
          distribution of letters,</div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Price details</h3>
            <p class="card-text">Monthly Fee <label for="" style="margin-left: 135px;" id="house_price"></label></p>
            <a href="payment.php?room_id=<?php echo $_GET['room_id']; ?>">
              <button class="btn btn-success form-control" id="reserveBtn">Reserve Now</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" value="<?php echo $_GET['room_id']; ?>" id="room_id">
  <?php include 'footer.html'; ?>
</body>
<script src="jquery.js"></script>
<script src="roomDetails.js"></script>
<script>
  function openFullscreen(img) {
    var overlay = document.createElement("div");
    overlay.classList.add("overlay");

    var fullscreenImg = document.createElement("img");
    fullscreenImg.classList.add("fullscreen-img");
    fullscreenImg.src = img.src;

    var closeBtn = document.createElement("span");
    closeBtn.classList.add("close-btn");
    closeBtn.innerHTML = "&times;";
    closeBtn.onclick = closeFullscreen;

    overlay.appendChild(fullscreenImg);
    overlay.appendChild(closeBtn);

    document.body.appendChild(overlay);

    overlay.style.display = "block";
  }

  function closeFullscreen() {
    var overlay = document.querySelector(".overlay");
    overlay.style.display = "none";

    overlay.removeChild(overlay.querySelector(".fullscreen-img"));
    overlay.removeChild(overlay.querySelector(".close-btn"));

    document.body.removeChild(overlay);
  }
</script>

</html>
