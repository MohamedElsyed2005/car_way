<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $car_id = $_GET["car_id"];
    $customer_id = $_GET["customer_id"];
    $reserve_date = date("Y-m-d");
    $pick_up_date = $_GET["pick_up_date"];
    $return_date = $_GET["return_date"];
    $price = $_GET["price"];
    $car_id = (int)$car_id;
    $customer_id = (int)$customer_id;
    $price = intval(preg_replace('/[^0-9]/', '', $price));  // استخدم preg_replace لاستخراج الرقم فقط

    $updateQuery = "UPDATE car SET status = 'rented' WHERE car_id = '$car_id'";
   if (mysqli_query($conn, $updateQuery)){
      $sql = "INSERT INTO car_reservation VALUES('', ' $car_id', '$customer_id','$reserve_date', '$pick_up_date', '$return_date')";
      if (mysqli_query($conn, $sql)) {
         echo "<script>alert('Car successfully rented!'); window.location.href = 'MyCar.php';</script>";
      } else {
         echo "<script>alert('Failed to add reservation data.'); window.history.back();</script>";
      }
   } else {
         echo "<script>alert('Failed to update car status.'); window.history.back();</script>";
   }
      } else {
         echo "<script>alert('Invalid request. Please try again.'); window.history.back();</script>";
      }
    
    //max_reservation_id
    $sql2 = "SELECT max(reservation_id) AS max_reservation_id FROM car_reservation";  
    $result2 = $conn->query($sql2);

    if ($result2) {
        $row2 = $result2->fetch_assoc();
       // echo "Max Reservation ID: " . $row2['max_reservation_id'];
        $reservation_id=$row2['max_reservation_id'];
        $sql3 = "INSERT INTO payment VALUES('',  $reservation_id , $price)";
        $result3 = $conn->query($sql3);
    } else {
        echo "Error executing query: " . $conn->error;
    }

