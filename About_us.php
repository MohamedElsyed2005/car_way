<?php
session_start();
require 'config.php';
$sql = "SELECT COUNT(customer_id) AS members
FROM customer
GROUP BY customer.customer_id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/infobar.css">
  <link rel="stylesheet" href="Css/about_us.css">
  <title>About us</title>
</head>
<body>
  <div class="about_lines">
    <div class="about_herz">
      <a href="" class="about_ancores"> Chery</a>
      <a href="" class="about_ancores"> Mercedes </a>
      <a href="" class="about_ancores"> AUDI </a>
      <a href="" class="about_ancores"> Skoda </a>
      <a href="" class="about_ancores"> BMW </a>
    </div>
    <div class="about_vert">
      <a href="" class="about_ancores"> chevrolet </a>
      <a href="" class="about_ancores"> Porsche </a>
      <a href="" class="about_ancores"> Mitsubishi </a>
      <a href="" class="about_ancores" style="margin-left: 20px;"> Nissan </a>
      <a href="" class="about_ancores" style="margin-left: 20px;"> Ferrari </a>
      <a href="" class="about_ancores" style="margin-left: 20px;"> Maserati </a>
    </div>
  </div>
  <a href="index.html"><img src="imgs/logo2.png" alt=""></a>
  <div class="about-container">
    <h1>About Us</h1>
    <p>"At Carway, we are committed to providing exceptional car rental
      services that cater to the diverse needs of our customers. Our services are
      flexible and offer a wide range of modern vehicles to suit all preferences and
      requirements. We strive to deliver a comfortable and safe travel experience with
      fully-equipped cars and 24/7 customer support. We focus on offering competitive
      pricing and special deals to ensure customer satisfaction. Our company upholds
      the highest quality standards in every aspect of our service, from booking to
      delivery. We aim to be your first choice when it comes to car rental, providing
      the utmost comfort and trust."</p>
    <div class="about_buttons">
      <?php
      if (empty($_SESSION["id"])) {
        echo '<a href="login.html"><button class="about_button"> Sign_in </button></a>';
      }else{
        echo '<a href="Home.php"><button class="about_button"> Home </button></a>';
      }
      ?>
    </div>
  </div>
  <div class="sample_container">
    <div class="data-container"> <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
      </svg> Members <br>
      <h2><?php
          echo $row['members'];
          ?></h2>
    </div>
    <div class="data-container"> <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
        <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
      </svg> Total Income <br>
      <h2><?php
          $sql = "SELECT SUM(cash) AS total_income
                  FROM payment";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          echo $row["total_income"];
          ?> $</h2>
    </div>
    <div class="data-container"> <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0" />
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
      </svg> Cars <br>
      <h2> <?php
            $sql = "SELECT COUNT(car_id) AS total_cars
                        FROM car";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row["total_cars"];
            ?></h2>
    </div>
  </div>
  </div>
</body>
</html>