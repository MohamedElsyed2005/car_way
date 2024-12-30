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
        <h4><?php echo $_SESSION["officename"]; ?></h4>
        <a href="dashboard.php">Dashboard</a>
        <a href="car_management.php">Car Management</a>
        <a href="booking_management.php" class="active">Booking Management</a>
        <a href="User_management.php">User Management</a>
        <a href="report.php">report</a>
        <a href="UserInfo.php">User</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Booking Management</h1>
        <form id="bookingForm" method="GET">
            <div class="info_lines"></div>
            <br> <input class="info_input" type="date" name="end" id="start_date" placeholder="Beginning">
            <button type="submit" class="rent-btn">Submit</button>
        </form>
        <!-- <p><?php echo "Choosen Date: ".$_GET['end'];?></p> -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Car</th>
                    <th>Booking Date</th>
                    <th>pickUp Date</th>
                    <th>return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $curr_date = isset($_GET['end']) ? $_GET['end'] : '';
                $sql = "SELECT DISTINCT * 
                        FROM car 
                        LEFT JOIN car_reservation 
                        ON car_reservation.car_id = car.car_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['return_date'] === null) {
                            $row['return_date'] = '2012-12-30';
                        }
                        echo "<tr>
                              <td>" . $row['car_id'] . "</td>
                              <td>" . $row['customer_id'] . "</td>
                              <td>" . $row['plate_id'] . "</td>
                              <td>" . $row['reserve_date'] . "</td>
                              <td>" . $row['pick_up_date'] . "</td>
                              <td>" . $row['return_date'] . "</td>";
                        if ($row['return_date'] > $curr_date & $row['pick_up_date'] < $curr_date) {
                           echo "<td><span class='badge bg-warning'>rented</span></td>";
                        } else {
                            echo "<td><span class='badge bg-success'>active</span></td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No cars found</td></tr>";
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