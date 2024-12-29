<?php
session_start();
require '../config.php';

$office_id = $_SESSION["id"];
$sql =         "SELECT*
                FROM office
                LEFT JOIN car ON car.office_id = office.office_id
                WHERE office.office_id = '$office_id';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4><?php echo $row["office_name"];?></h4>
        <a href="dashboard.php">Dashboard</a>
        <a href="car_management.php" class="active">Car Management</a>
        <a href="booking_management.php">Booking Management</a>
        <a href="reports.html">Reports</a>
        <a href="settings.html">Settings</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Car Management</h1>

        <!-- Button to trigger modal -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCarModal">Add New Car</button>

        <!-- Modal to Add New Car -->
        <div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCarModalLabel">Add New Car</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add/Edit Car Modal -->
                        <form id="carForm" method="POST" action="add_car.php">
                            <input type="hidden" id="car_id" name="car_id">
                            <div class="mb-3">
                                <label for="plate_id" class="form-label">Plate ID</label>
                                <input type="text" class="form-control" id="plate_id" name="plate_id" required>
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" name="brand" required>
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Car Model</label>
                                <input type="text" class="form-control" id="model" name="model" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="manufacture" class="form-label">Manufacture</label>
                                <input type="text" class="form-control" id="manufacture" name="manufacture" required>
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <input type="number" class="form-control" id="year" name="year" required>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="color" name="color" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="active">Active</option>
                                    <option value="rented">Rented</option>
                                    <option value="out_of_service">Out of Service</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Car Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Plate ID</th>
                    <th>Brand</th>
                    <th>Car Model</th>
                    <th>Type</th>
                    <th>Manufacture</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $statusClass = '';
                        if ($row['status'] == 'rented') {
                            $statusClass = 'bg-warning';
                        } elseif ($row['status'] == 'active') {
                            $statusClass = 'bg-success';
                        } elseif ($row['status'] == 'out_of_service') {
                            $statusClass = 'bg-danger';
                        }
                        echo "<tr>
                                <td>" . $row['car_id'] . "</td>
                                <td>" . $row['plate_id'] . "</td>
                                <td>" . $row['brand'] . "</td>
                                <td>" . $row['model'] . "</td>
                                <td>" . $row['type'] . "</td>
                                <td>" . $row['manufacture'] . "</td>
                                <td>" . $row['year'] . "</td>
                                <td>" . $row['color'] . "</td>
                                <td>" . $row['price'] . "</td>
                                <td><span class='badge $statusClass'>" . $row['status'] . "</span></td>
                                <td>
                                    <button class='btn btn-warning btn-sm' onclick='editCar(" . json_encode($row) . ")'>Edit</button>
                                    <form action='delet_car.php' method='post'>
                                        <input type='hidden' name='car_id' value='" . $row['car_id'] . "'>
                                    <button class='btn btn-danger btn-sm'>Delete</button>
                                    </form>
                                </td>
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
    <script src="car_mang.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editCar(car) {

            const modal = new bootstrap.Modal(document.getElementById('addCarModal'));
            modal.show();

            document.getElementById('car_id').value = car.car_id;
            document.getElementById('plate_id').value = car.plate_id;
            document.getElementById('brand').value = car.brand;
            document.getElementById('model').value = car.model;
            document.getElementById('type').value = car.type;
            document.getElementById('manufacture').value = car.manufacture;
            document.getElementById('year').value = car.year;
            document.getElementById('color').value = car.color;
            document.getElementById('price').value = car.price;
            document.getElementById('status').value = car.status;

            document.querySelector('#addCarModalLabel').textContent = 'Edit Car';
            document.querySelector('form').action = 'edit_car.php';
        }
    </script>
</body>

</html>