<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];
    $plate_id = $_POST['plate_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $manufacture = $_POST['manufacture'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $status = $_POST['status'];

    $sql = "UPDATE car SET 
            plate_id = '$plate_id', 
            brand = '$brand', 
            model = '$model', 
            type = '$type', 
            manufacture = '$manufacture', 
            year = $year, 
            color = '$color', 
            status = '$status' 
            WHERE car_id = $car_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: car_management.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
  