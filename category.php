<?php

session_start();
require 'config.php';

if (isset($_SESSION['id'])) {
  echo "user in";
} else {
    echo "Not login";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Plans</title>
  <link rel="stylesheet" href="Css/style.css">
  <link rel="stylesheet" href="Css/all.min.css">
  <link rel="stylesheet" href="Css/index.css">
  <link rel="stylesheet" href="Css/category.css">
</head>
<body >
  <!--start head-->
  <!--end head-->

  <nav class="nav">
    <img src="imgs/logo.png" class="nav-logo">
    <div class="nav-menu" id="navMenu">
        <ul>
            <li><a href="index.html" class="link">Home</a></li>
            <li><a href="login.html" class="link">User</a></li>
            <li><a href="admin/loginAdmin.html" class="link">Admin</a></li>
            <li><a href="category.php" class="link active">Categoty</a></li>
            <li><a href="About_us.php" class="link">About</a></li>
        </ul>
    </div>
</nav>

  <!--Start page -->
  <div class="part_one">
    <div class="c1">

        <!--1-->
        <div class="card" data-bg="imgs/mercedes.png" onclick="window.location.href='Rent_Car.php?category_id=Mercedes'" ><img src="imgs/mercedes.png" width="120" height="120" alt="">
        </div>


        <!--1-->
        <div class="card" data-bg="imgs/audi2.png" onclick="window.location.href='Rent_Car.php?category_id=Audi'"><img src="imgs/audi2.png" width="90%" height="auto" alt=""></div>

      <!--1-->
      <div class="card" data-bg="imgs/porsch2.png" onclick="window.location.href='Rent_Car.php?category_id=Porsch'" ><img src="imgs/porsch2.png" width="70%" height="auto" alt=""></div>

        <!--1-->
        <div class="card" data-bg="imgs/BMW.png" onclick="window.location.href='Rent_Car.php?category_id=Bmw'" ><img src="imgs/BMW.png" width="120" height="120" alt=""></div>

    </div>
    <div class="c2">

        <!--1-->
        <div class="card" data-bg="imgs/KIA.png" onclick="window.location.href='Rent_Car.php?category_id=Kia'" ><img src="imgs/KIA.png" width="150" height="55" alt=""></div>

        <!--1-->
        <div class="card" data-bg="imgs/mitsu.png" onclick="window.location.href='Rent_Car.php?category_id=Mitsubishi'" ><img src="imgs/mitsu.png" width="100%" height="auto" alt=""></div>

    </div>
    <!--
<a href="About_us.html">
            <div class="test" > <img src="../Cour-Way/imgs/White-Courway.png" alt=""> </div>
</a>
-->
    <div class="c3" >

        <!--1-->
        <div class="card" data-bg="imgs/chery.png" onclick="window.location.href='Rent_Car.php?category_id=Chery'" >
          <div><img src="imgs/chery.png" width="170" height="170" alt=""></div>
        </div>


        <!--1-->
        <div class="card" data-bg="imgs/TESLA.png" onclick="window.location.href='Rent_Car.php?category_id=Tesla'" ><img src="imgs/TESLA.png" width="140" height="140" alt=""></div>

    </div>
    <div class="c4">

        <!--1-->
        <div class="card" data-bg="imgs/TOYOTA.png" onclick="window.location.href='Rent_Car.php?category_id=Toyota'" ><img src="imgs/TOYOTA.png" width="150" height="120"> </div>


        <!--1-->
        <div class="card" data-bg="imgs/chevo.png" onclick="window.location.href='Rent_Car.php?category_id=Chevrolet'" ><img src="imgs/chevo.png" width="100%" height="auto" alt=""></div>


        <!--1-->
        <div class="card" data-bg="imgs/lamborgini.png" onclick="window.location.href='Rent_Car.php?category_id=Lamborgini'" ><img src="imgs/lamborgini.png" width="160" height="170" alt="">
        </div>


        <!--1-->
        <div class="card" data-bg="imgs/skoda.png" onclick="window.location.href='Rent_Car.php?category_id=Skoda'" ><img src="imgs/skoda.png" width="300" height="120" alt=""></div>

    </div>
  </div>
  <!--End page -->

  <script>
    document.body.style.backgroundImage = "url('../car_way/imgs/carway.png')";
    document.body.style.backgroundColor = "black";
    document.body.style.backgroundPosition = "center";
    document.body.style.backgroundSize = "20%";

    document.addEventListener("DOMContentLoaded", function () {
      document.body.style.zoom = "60%";
    });

    const boxes = document.querySelectorAll('.card');
    boxes.forEach(box => {
      box.addEventListener('mouseenter', () => {
        
        document.body.style.backgroundImage = `url('${box.getAttribute('data-bg')}')`;
      });
      box.addEventListener('mouseleave', () => {
        document.body.style.backgroundImage = "url('../car_way/imgs/carway.png')";
        document.body.style.backgroundRepeat = "no-repeat";
        document.body.style.backgroundPosition = "center";
        document.body.style.backgroundSize = "20%";
        document.body.style.transition = "background-image 0.3s ease-in-out, background-color 2s ease-in-out";
      });
    });
  </script>
</body>
</html>