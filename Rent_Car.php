<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="Css/rent_car.css">
    <title>Rent Car</title>
</head>

<body>
    <div class="wrapper">
        <!-- Navigation Bar -->
        <nav class="nav">
            <img src="imgs/logo.png" class="nav-logo" alt="Logo">
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="Home.php" class="link">Home</a></li>
                    <li><a href="MyCar.php" class="link">My Cars</a></li>
                    <li><a href="Rent_Car.php" class="link active">Rent Cars</a></li>
                    <li><a href="About_us.php" class="link">About</a></li>
                    <li><a href="profile.php" class="link">profile</a></li>
                </ul>
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="logoutBtn" onclick="showLogoutModal()">Log out</button>
            </div>
        </nav>
        <div class="car-container">
            <div class="car-list">
                <?php
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $sql = "SELECT * FROM car, office WHERE car.office_id = office.office_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {


                        echo "<div class='car-item'>
                        <h3>" . $row['plate_id'] . "</h3>
                        <p>Brand: " . $row['brand'] . "</p>
                        <p>Status: " . $row['status'] . "</p>
                        <p>Office name: " . $row['office_name'] . "</p>
                        <form method='POST' action='payment.php'>
                            <input type='hidden' name='plate_id' value='" . $row['plate_id'] . "'>
                            <button type='submit' class='rent-btn'>Rent Now</button>
                        </form>
                    </div>";
                    }
                } else {
                    echo "<p>No cars available at the moment.</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        const searchInput = document.createElement('input');
        searchInput.setAttribute('type', 'text');
        searchInput.setAttribute('name', 'search');
        searchInput.setAttribute('placeholder', 'Search Cars...');
        searchInput.classList.add('search-box');

        const contentDiv = document.querySelector('.car-container');
        contentDiv.insertBefore(searchInput, contentDiv.querySelector('.car-list'));

        searchInput.addEventListener('keyup', () => {
            const filter = searchInput.value.toLowerCase();
            const carItems = document.querySelectorAll('.car-item');
            carItems.forEach((carItem) => {
                const text = carItem.textContent.toLowerCase();
                carItem.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>
</html>