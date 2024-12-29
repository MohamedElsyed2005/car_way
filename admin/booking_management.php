<?php
session_start();
require '../config.php';
$office_id = $_SESSION["id"];
$sql =  "SELECT *
         FROM car_reservation
         LEFT JOIN car ON car.car_id = car_reservation.car_id
         WHERE car.office_id = '$office_id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4><?php echo $_SESSION["officename"];?></h4>
        <a href="dashboard.php">Dashboard</a>
        <a href="car_management.php">Car Management</a>
        <a href="booking_management.php" class="active">Booking Management</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Booking Management</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Car</th>
                    <th>Booking Date</th>
                    <th>pickUp Date</th>
                    <th>return Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row['reservation_id'] . "</td>
                            <td>" . $row['customer_id'] . "</td>
                            <td>" . $row['car_id'] . "</td>
                            <td>" . $row['reserve_date'] . "</td>
                            <td>" . $row['pick_up_date'] . "</td>
                            <td>" . $row['return_date'] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No cars found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 Car Rental System - Admin Dashboard
    </footer>
</body>

</html>