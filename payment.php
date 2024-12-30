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
    <title>Payment</title>
</head>

<body>
    <!--start content-->
    <div class="payment">
        <div class="col1">
            <div class="col1_1"></div>
            <div class="col1_2">
                <div class="col1_2_1">CAR-WAY</div>
                <div class="col1_2_2">PAYMENT DETAILS</div>
                <div class="col1_2_3">
                    <form id="rentForm" method="GET">
                        <div class="info_lines">-Beginning of rent : </div>
                        <br> <input class="info_input" type="date" name="start" id="start_date" placeholder="Beginning">
                        <div class="info_lines">-End of rent : </div>
                        <br> <input class="info_input" type="date" name="end" id="end_date" placeholder="End">
                        <button type="submit" class="rent-btn">Submit</button>
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
                        <input class="info_input_2" type="number" name=customer_id value="<?php echo $_SESSION["id"]; ?>" readonly>
                        <input class="info_input_2" type="number" name=car_id value="<?php echo $row["car_id"]; ?>" readonly>
                        <hr>
                        <input class="info_input_2" type="text" name=plate_id value="plate_id : <?php echo $row["plate_id"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=brand value="brand : <?php echo $row["brand"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=model value="model : <?php echo $row["model"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=type value="type : <?php echo $row["type"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=manufacture value="manufacture : <?php echo $row["manufacture"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=year value="year : <?php echo $row["year"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=color value="color : <?php echo $row["color"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=office_id value="office_id : <?php echo $row["office_id"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=price value="price : <?php echo $row["price"]; ?>" readonly>
                        <input class="info_input_2" type="text" name=status value="status : <?php echo $row["status"]; ?>" readonly>
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
                                echo "Number of days: " . $numberOfDays;
                            } else {
                                echo "None";
                            }
                        } else {
                            echo "None";
                        }
                        ?>
                        " readonly>
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
                                echo "Total Price: "  . $maximum;
                            } else {
                                echo "None";
                            }
                        } else {
                            echo "None";
                        }
                        ?>
                        " readonly>
                        <input class="info_input_2" type="date" name="pick_up_date" value="<?php echo $startDateformat; ?>" readonly hidden>
                        <input class="info_input_2" type="date" name="return_date" value="<?php echo $endDateformat; ?>" readonly hidden>
                        <br>
                        <br>
                        <input class="about_button" type="submit" value="Rent This Car Now">
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
    <script src="JS/payment.js"></script>
</body>

</html>