document.getElementById("rentForm").addEventListener("submit", function(event) {
        const startDateInput = document.getElementById("start_date");
        const endDateInput = document.getElementById("end_date");
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);
        const today = new Date();

        if (!startDate || !endDate) {
            alert("Please select both start and end dates.");
            event.preventDefault(); 
        } else if (startDate > endDate) {
            alert("End date cannot be earlier than the start date.");
            event.preventDefault();
        } else if (startDate === endDate) {
            alert("End date cannot be equal than the start date.");
            event.preventDefault();
        } else if (startDate < today) {
            alert("Start date cannot be in the past.");
            event.preventDefault();
        }
});

document.addEventListener("DOMContentLoaded", function() {
    document.body.style.zoom = "80%";
});