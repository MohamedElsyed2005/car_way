<?php
session_start();
require '../config.php';

$office_id = $_SESSION["id"];
$sql =         "SELECT COUNT(car.car_id) AS total_cars, office.office_name AS office_name, (SELECT COUNT(*) FROM car WHERE car.status = 'active' AND car.office_id = '$office_id') AS total_active_cars
                FROM office
                LEFT JOIN car ON car.office_id = office.office_id
                WHERE office.office_id = '$office_id';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION["officename"] = $row["office_name"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4><?php echo $_SESSION["officename"]; ?></h4>
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="car_management.php">Car Management</a>
        <a href="booking_management.php">Booking Management</a>
        <a href="User_management.php">User Management</a>
        <div class="nav-button">
            <button class="btn white-btn" id="logoutBtn" onclick="showLogoutModal()">Log out</button>
        </div>
        <!-- Logout Modal -->
        <div id="logoutModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Are you sure you want to log out?</h2>
                <p>If you log out, you will need to log in again to continue using the service.</p>
                <button class="btn modal-btn" onclick="logout()">Yes, Log me out</button>
                <button class="btn modal-btn" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5>Total Cars</h5>
                        <p><?php echo $row["total_cars"]; ?></p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5>Active Rentals</h5>
                        <p><?php echo $row["total_active_cars"]; ?></p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5>Total Bookings</h5>
                        <p><?php
                            $sql = "SELECT COUNT(*) AS Booking_number
                                    FROM car_reservation
                                    LEFT JOIN car ON car.car_id = car_reservation.car_id
                                    WHERE car.office_id = '$office_id'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo $row["Booking_number"];
                        ?></p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5>Total Earn</h5>
                        <p><?php 
                             $sql = "SELECT SUM(cash) AS total
                                     FROM car_reservation as cr,payment as p, car as c
                                     WHERE cr.reservation_id = p.reservation_id AND cr.car_id = c.car_id AND c.office_id = '$office_id'
                                     GROUP BY c.office_id ";
                             $result = mysqli_query($conn, $sql);
                             $row = mysqli_fetch_assoc($result);
                             if (mysqli_num_rows($result) > 0){
                                echo $row["total"];
                             }
                                echo 0;     
                        ?>$</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5>Daily Income (in all branches)</h5>
                        <p><?php 
                             $sql = "SELECT DATE(car_reservation.reserve_date) AS transaction_date, SUM(payment.cash) AS daily_income
                                     FROM payment 
                                     JOIN car_reservation 
                                     ON payment.reservation_id = car_reservation.reservation_id
                                     GROUP BY DATE(car_reservation.reserve_date)
                                     ORDER BY transaction_date;";
                             $result = mysqli_query($conn, $sql);
                             $row = mysqli_fetch_assoc($result);
                             if (mysqli_num_rows($result) > 0){
                                echo $row["daily_income"];
                             } else {
                                echo 0;   
                             }?>$</p>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    <script>
        // Show modal when log out button is clicked
        function showLogoutModal() {
            document.getElementById("logoutModal").style.display = "block";
        }

        // Close modal
        function closeModal() {
            document.getElementById("logoutModal").style.display = "none";
        }

        // Log out and redirect to login page
        function logout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "../log_out.php"; // Redirect to the PHP logout script
            }

        }
    </script>
    <!-- Footer -->
    <footer>
        © 2024 Car Rental System -