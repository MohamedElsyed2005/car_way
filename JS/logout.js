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