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
	<title>Guest House Details</title>
	<style>

        #cardID {
            position: relative;
        }
        #reserveBtn{
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .container {
            position: relative;
        }

        .img {
            width: 100%;
            height: auto;
            cursor: pointer;
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

<body class="bg-light">
	
<?php
// Assuming you have retrieved the money value from the database
$amount = 1234;

// Format the money value with two decimal places and a comma as the thousands separator
$formattedAmount = number_format($amount, 0, '.', ',');

// Display the formatted amount
echo $formattedAmount;
?>


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