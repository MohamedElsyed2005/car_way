<?php
session_start();
require '../config.php';
$office_id = $_SESSION["id"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plate_id = $_POST['plate_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $manufacture = $_POST['manufacture'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "INSERT INTO car (plate_id, brand, model, type, manufacture, year, color, price, office_id, status)
            VALUES ('$plate_id', '$brand', '$model', '$type', '$manufacture', '$year', '$color', '$price' ,'$office_id','$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: car_management.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
