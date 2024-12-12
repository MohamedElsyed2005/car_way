<?php
    require '../config.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $car_id=$_POST["car_id"];
        $sql = "DELETE FROM car WHERE car_id = $car_id" ;

        if ($conn->query($sql) === TRUE) {
            header("Location: car_management.php");  
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
    
    $conn->close();
    
    ?>