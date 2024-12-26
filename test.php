<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="Css/all.min.css">
    <title>Car Rental Service</title>

</head>

<body>
    <div class="wrapper">
        <!-- Navigation Bar -->
        <nav class="nav">
            <img src="imgs/logo.png" class="nav-logo" alt="Logo">
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="Home.php" class="link">Home</a></li>
                    <li><a href="carrer.html" class="link">My Cars</a></li>
                    <li><a href="Rent_Car.php" class="link">Rent Cars</a></li>
                    <li><a href="About_us.html" class="link">About</a></li>
                    <li><a href="profile.php" class="link  active">profile</a></li>
                </ul>
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="logoutBtn" onclick="showLogoutModal()">Log out</button>
            </div>
        </nav>
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
        <!--Start page -->
        <div class="page">


            <div class="car-container">
                <div class="car-list">
                    <?php

                    $sql = "SELECT Distinct car_id FROM car_reservation WHERE return_date>CURDATE() AND customer_id = " . intval($_SESSION['id']);
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            echo $row['car_id'];
                            $sql2 = $sql2 = "SELECT * FROM car WHERE car_id = " . intval($row["car_id"]);
                            $result2 = $conn->query($sql2);
                            while ($row2 = $result2->fetch_assoc()) {

                                echo "<div class='car-item'>
                                <h3>" . $row2['brand'] .  "</h3>
                                <p>Brand: " . $row2['plate_id'] . "</p>
                                <p>Colot: " . $row2['color'] . "</p>
                                <p>Tyoe: " . $row2['type'] . "</p>
                                <p>Year: " . $row2['year'] . "</p>
                                <p>Price: " . $row2['price'] . "</p>
                                <p>manufacture: " . $row2['manufacture'] . "</p>
                                <p>Status: " . $row2['status'] . "</p>
                                    <input type='hidden' name='plate_id' value='" . $row2['plate_id'] . "'>
                                    <button type='submit' class='rent-btn' id='cancel' onclick='showLogoutModal()' >Cancel_Rent</button>
                            </div>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <div id="logoutModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2>Are you sure you want to log out?</h2>
                    <p>If you log out, you will need to log in again to continue using the service.</p>
                    <button class="btn modal-btn" onclick="closeModal()">Cancel</button>
                    <button class="btn modal-btn" onclick="okay(' . json_encode($row) . ') ">Okay</button>
                </div>
            </div>


        </div>
        <!--End page -->
        <script>
            function showLogoutModal() {
                document.getElementById("logoutModal").style.display = "block";
            }

            // Close modal
            function closeModal() {
                document.getElementById("logoutModal").style.display = "none";
            }

            function okay(car) {
                
                const modal = new bootstrap.Modal(document.getElementById("logoutModal"));
                    modal.show();
                if (confirm("Are you sure you want to log out?")) {

                    document.querySelector('#addCarModalLabel').textContent = 'canel_rent';
                    document.querySelector('form').action = 'cancel_rent.php';
                }

            }
        </script>

</body>

</html>