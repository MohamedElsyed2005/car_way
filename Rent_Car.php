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
        </nav>
        <div class="car-container">
            <div class="car-list">
                <?php
                    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
                    $sql = "SELECT * FROM car, office 
                           WHERE car.office_id = office.office_id 
                           AND (car.brand LIKE '%$search%' OR office.office_name LIKE '%$search%')";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='car-item'>
                                <h3>" . $row['plate_id'] . "</h3>
                                <p>Brand: " . $row['brand'] . "</p>
                                <p>Status: " . $row['status'] . "</p>
                                <p>Office name: " . $row['office_name'] . "</p>
                                <form method='POST' action='payment.php'>
                                <input type='hidden' name='plate_id' value='" . $row['plate_id'] . "'>";
                                if ($row['status'] == 'active') {
                                    echo "<button type='submit' class='rent-btn'>Rent Now</button>";
                                }
                                echo "</form>
                                </div>";
                                }
                    } else {
                    echo "<p>No cars match your search criteria.</p>";
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
            window.location.href = "log_out.php"; // Redirect to the PHP logout script
        }

    }
</script>
</body>

</html>