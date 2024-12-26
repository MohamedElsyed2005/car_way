<?php
session_start();
require 'config.php';

if (isset($_POST['plate_id'])) {
    $_SESSION['plate_id'] = $_POST['plate_id'];
}
if (isset($_SESSION['plate_id'])) {
    $id = $_SESSION["plate_id"];
    $result = mysqli_query($conn, "SELECT * FROM car where plate_id= '$id' ");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "ffff";
    }
} else {
    echo "No car selected.";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/all.min.css">
    <link rel="stylesheet" href="Css/payment.css">

    <title>notification</title>
</head>

<body>
    <!--start head-->
    <nav class="navbar">
        <a href="Courses.html">
            <img src="imgs/logo bar.svg" class="logo-bar">
        </a>
        <div class="navbar-center">
            <input type="search" class="search-bar" placeholder="Type A Keyword">
        </div>
        <div class="navbar-right">
            <a href="MyCourses.html" class="link">My Learning</a>
            <!-- Wish list -->
            <a href="Wish_list.html" class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2-heart-fill" viewBox="0 0 16 16">
                    <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM8.5 4h6l.5.667V5H1v-.333L1.5 4h6V1h1zM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                </svg></a>
            <!-- cart -->
            <a href="Plans.html" class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
            </a>
            <!-- notification -->
            <a href="notification.html" class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                </svg></a>
            <!-- profile -->
            <a href="profile.html" class="profile1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg></a>
        </div>
    </nav>
    <!--end head-->

    <!--start content-->
    <div class="payment">


        <div class="col1">


            <div class="col1_1"></div>






            <div class="col1_2">
                <div class="col1_2_1">CAR-WAY</div>
                <div class="col1_2_2">PAYMENT DETAILS</div>
                <div class="col1_2_3">

                    <form action="" method="GET">

                        <div class="info_lines" style="margin-top: 10px;">-Id : </div>
                        <br> <input class="info_input" type="text" name="id" placeholder=" Id" disabled>

                        <div class="info_lines">-Beginning of rent : </div>
                        <br> <input class="info_input" type="date" name="start" placeholder="Beginning">

                        <div class="info_lines">-End of rent : </div>
                        <br> <input class="info_input" type="date" name="end" placeholder="End">
                        <button type="submit" class="rent-btn">submit</button>
                    </form>





                </div>
            </div>

        </div>




        <div class="col2">



            <div class="col2_2">
                <div class="col2_2_1" style="font-size: 20px;">Order Summary</div>
                <div class="col2_2_2">




                    <form action="car_reservation.php" method="GET">
                        <div class="info_lines_2" style="margin-top: 10px;">-Customer and car ID's : </div>
                        <input class="info_input_2" type="number" name=customer_id value="<?php echo $_SESSION["id"]; ?>"  readonly >    
                        <input class="info_input_2" type="number" name=car_id value="<?php echo $row["car_id"]; ?>" readonly >
                        <hr>
                        <input class="info_input_2" type="text" name=plate_id value="plate_id : <?php echo $row["plate_id"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=brand value="brand : <?php echo $row["brand"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=model value="model : <?php echo $row["model"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=type value="type : <?php echo $row["type"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=manufacture value="manufacture : <?php echo $row["manufacture"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=year value="year : <?php echo $row["year"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=color value="color : <?php echo $row["color"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=office_id value="office_id : <?php echo $row["office_id"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=price value="price : <?php echo $row["price"]; ?>" readonly >
                        <input class="info_input_2" type="text" name=status value="status : <?php echo $row["status"]; ?>" readonly >
                        <hr>
                        <div class="info_lines_2" style="margin-top: 10px;">-Number Of Days : </div>
                        <input class="info_input_2" type="text" name="days" value=" 
                        
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['start']) && isset($_GET['end'])) {

                            $start_date = $_GET['start'];
                            $end_date = $_GET['end'];

                            if (!empty($start_date) && !empty($end_date)) {

                                $startDate = new DateTime($start_date);
                                $endDate = new DateTime($end_date);
                                $interval = $startDate->diff($endDate);
                                $numberOfDays = $interval->days;
                                if($startDate > $endDate){
                                    echo "Un-Valid Date";
                                }elseif($startDate< date("Y-m-d")){
                                    echo "Un-Valid Date";
                                }else{
                                echo "Number of days: " . $numberOfDays;
                                }
                            } else {
                                echo "None";
                            }
                        } else {
                            echo "None";
                        }
                        ?>
                        
                        
                        " readonly >


                        <div class="info_lines_2">-TOTAL : </div>
                        <input class="info_input_2" type="text" name="price" value=" 

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['start']) && isset($_GET['end'])) {

                            $start_date = $_GET['start'];
                            $end_date = $_GET['end'];

                            $result = mysqli_query($conn, "SELECT price FROM car WHERE plate_id = '$row[plate_id]' ");
                            $price = mysqli_fetch_assoc($result);

                            if (!empty($start_date) && !empty($end_date)) {

                                $startDate = new DateTime($start_date);
                                $startDateformat = $startDate->format('Y-m-d');
                                $endDate = new DateTime($end_date);
                                $endDateformat = $endDate->format('Y-m-d');
                                $interval = $startDate->diff($endDate);
                                $numberOfDays = $interval->days;
                                $maximum = $price['price'] *  $numberOfDays;
                                if($startDate > $endDate){
                                    echo "Un-Valid Date";
                                }elseif($startDate< date("Y-m-d")){
                                    echo "Un-Valid Date";
                                }else{
                                    echo "Total Price: "  . $maximum;
                                }
                            } else {
                                echo "None";
                            }
                        } else {
                            echo "None";
                        }
                        ?>
                        
                        " readonly >
                        <input class="info_input_2" type="date" name="pick_up_date" value="<?php echo $startDateformat; ?>" readonly hidden >
                        <input class="info_input_2" type="date" name="return_date" value="<?php echo $endDateformat; ?>" readonly hidden>

                        <br>
                        <br>
                        <input class="about_button" type="submit" value="Rent-This-Car-Now">
                    </form>



                </div>

            </div>
        </div>

    </div>



    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.style.zoom = "80%";
        });
    </script>

</body>

</html>