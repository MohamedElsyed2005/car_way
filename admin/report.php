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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="styles.css" rel="stylesheet">
</head>

<body>
   <!-- Sidebar -->
   <div class="sidebar">
        <h4><?php echo $_SESSION["officename"]; ?></h4>
        <a href="dashboard.php">Dashboard</a>
        <a href="car_management.php">Car Management</a>
        <a href="booking_management.php">Booking Management</a>
        <a href="User_management.php">User Management</a>
        <a href="report.php" class="active">report</a>
        <a href="UserInfo.php">User</a>
        <div class="nav-button">
            <button class="btn white-btn" id="logoutBtn" onclick="showLogoutModal()">Log out</button>
        </div>
        <!-- Logout Modal -->
        <div id="logoutModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2></h2>
                <p></p>
                <!-- <button class="btn modal-btn" onclick="logout()">Yes, Log me out</button> -->
                <!-- <button class="btn modal-btn" onclick="closeModal()">Cancel</button> -->
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
            <div class="col-md-3">
                <div class="card text-white bg-dark mb-3">
                  <div class="card-body">
                    <h5>Income Between Two Dates</h5>
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
        <h1>Report</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5>Total Cars</h5>
                        <p><?php
                            $start_date = isset($_GET['start']) ? $_GET['start'] : '';
                            $end_date = isset($_GET['end']) ? $_GET['end'] : '';

                            $sql = "SELECT * FROM car_reservation JOIN customer ON car_reservation.customer_id = customer.customer_id JOIN car ON car.car_id = car_reservation.car_id 
                                     WHERE reserve_date >= '$start_date' AND reserve_date <= '$end_date'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "ID: " . $row["customer_id"] . " - " . $row["first_name"] . " - " . $row["Email"] .  $row["phone"] . " - " . $row["car_id"] . " - " . $row["plate_id"] . " - " . $row["model"] ."<br>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?></p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5>Active Rentals</h5>
                        <p><?php
                          $start_date = isset($_GET['start']) ? $_GET['start'] : '';
                          $end_date = isset($_GET['end']) ? $_GET['end'] : '';

                          $sql = "SELECT * FROM payment JOIN car_reservation ON car_reservation.reservation_id = payment.reservation_id 
                                   WHERE reserve_date >= '$start_date' AND reserve_date <= '$end_date'";

                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                  echo "Car_ID: " . $row["car_id"] . "   ---    " . $row["cash"] . "   ---    ". $row["reserve_date"] .  "<br>";
                              }
                          } else {
                              echo "0 results";
                          }
                            ?>
                        </p>
                    </div>
                </div>
            </div>






        </div>
    </div>
    <script>
        function showLogoutModal() {
            document.getElementById("logoutModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("logoutModal").style.display = "none";
        }


        function logout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "../log_out.php";
            }

        }
    </script>
    <!-- Footer -->
    <footer>
        Â© 2024 Car Rental System -