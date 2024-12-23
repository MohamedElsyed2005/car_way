<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plate_id = $_POST['plate_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $manufacture = $_POST['manufacture'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $status = $_POST['status'];

    $sql = "INSERT INTO car (plate_id, brand, model, type, manufacture, year, color, office_id, status)
            VALUES ('$plate_id', '$brand', '$model', '$type', '$manufacture', '$year', '$color','1','$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: car_management.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
