<?php
require 'config.php';

if(isset($_POST["submit"])){
    $brand = $_POST["brand"];
    $color = $_POST["color"];
    $manufacture = $_POST["manufacture"];
    $model = $_POST['model'];
    $office_id = $_POST["office_id"];
    $plate_id = $_POST["plate_id"];
    $type = $_POST["type"];
    $year = $_POST["year"];



    $duplicate = mysqli_query($conn,"SELECT * FROM car WHERE plate_id = '$plate_id' ");

    if(mysqli_num_rows($duplicate) > 0){
       echo "<script> alert('Try another Email');</script>";
    }
    else{
      //  car_id	plate_id	brand	model	type	manufacture	year	color	office_id	status	
        $query = "INSERT INTO car VALUES( ''  , '$plate_id' , '$brand' , '$model', '$type' , '$manufacture', '$year', '$color' ,  '$office_id' , '' )";
        
        mysqli_query($conn, $query);
        echo "<script> alert('Registration Successful');</script>";
    }
    
}
?>