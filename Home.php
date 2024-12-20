<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Car Rental Service</title>
</head>

<body>
    <div class="wrapper">
        <!-- Navigation Bar -->
        <nav class="nav">
            <img src="imgs/logo.png" class="nav-logo" alt="Logo">
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="#" class="link active">Home</a></li>
                    <li><a href="#" class="link">Blog</a></li>
                    <li><a href="#" class="link">Services</a></li>
                    <li><a href="#" class="link">About</a></li>
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

        <!-- Intro Section -->
        <section class="intro">
            <h1>Welcome to Our Car Rental Service</h1>
            <p>We offer the best cars at affordable prices for all your travel needs.</p>
        </section>

        <!-- Services Section -->
        <section class="services">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="card">
                    <h3>Luxury Cars</h3>
                    <p>Enjoy the comfort and elegance of our premium cars.</p>
                </div>
                <div class="card">
                    <h3>Affordable Rentals</h3>
                    <p>Cost-effective options to suit every budget.</p>
                </div>
                <div class="card">
                    <h3>24/7 Support</h3>
                    <p>We are here to assist you anytime, anywhere.</p>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="footer">
            <p>&copy; 2024 Car Rental Service. All rights reserved.</p>
        </footer>
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
            alert("You have been logged out successfully!");
            window.location.href = "login.html"; // Redirect to login page
        }
    </script>

</body>

</html>