<?php
require '../config.php';

$sql =         "SELECT COUNT(*) AS total_cars,
               (SELECT COUNT(*) FROM car WHERE status = 'active') AS total_active_cars
               FROM car;";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
        <h4>Admin Panel</h4>
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="user_management.html">User Management</a>
        <a href="car_management.php">Car Management</a>
        <a href="booking_management.html">Booking Management</a>
        <a href="reports.html">Reports</a>
        <a href="settings.html">Settings</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5>Total Cars</h5>
                        <p><?php echo $row["total_cars"];?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5>Active Rentals</h5>
                        <p><?php echo $row["total_active_cars"];?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5>Pending Bookings</h5>
                        <p>15</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5>Total Earn</h5>
                        <p>36630$</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer>
        © 2024 Car Rental System -