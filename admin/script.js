// Handle Delete Button Click
document.querySelectorAll('.btn-danger').forEach((button) => {
    button.addEventListener('click', (event) => {
        const confirmed = confirm("Are you sure you want to delete this user?");
        if (!confirmed) {
            event.preventDefault();
        } else {
            alert("User deleted successfully!");
        }
    });
});


// Filter/Search Table
const searchInput = document.createElement('input');
searchInput.setAttribute('type', 'text');
searchInput.setAttribute('placeholder', 'Search User...');
searchInput.classList.add('form-control', 'mb-3');

const contentDiv = document.querySelector('.content');
contentDiv.insertBefore(searchInput, contentDiv.querySelector('table'));

searchInput.addEventListener('keyup', () => {
    const filter = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll('.table tbody tr');
    rows.forEach((row) => {
        const cells = row.querySelectorAll('td');
        const match = Array.from(cells).some((cell) => 
            cell.textContent.toLowerCase().includes(filter)
        );
        row.style.display = match ? '' : 'none';
    });
});

// Change Password Form Handling
document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (newPassword === confirmPassword) {
        alert("Password changed successfully!");
    } else {
        alert("Passwords do not match!");
    }
});

// Change Email Form Handling
document.getElementById('changeEmailForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const currentEmail = document.getElementById('currentEmail').value;
    const newEmail = document.getElementById('newEmail').value;

    alert("Email changed successfully!");
});

// System Settings Form Handling
document.getElementById('systemSettingsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const siteName = document.getElementById('siteName').value;
    const siteDescription = document.getElementById('siteDescription').value;

    alert("System settings saved successfully!");
});
