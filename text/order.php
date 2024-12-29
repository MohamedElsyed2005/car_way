<?php
$conn = new mysqli("localhost", "", "", "");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT name FROM item");
if ($result->num_rows > 0) {
    $options = "";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    }
} else {
    $options = "<option value=''>No items available</option>";
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Food</title>
</head>
<body>
    <form action="order-submit.php" method="POST">
        <label for="foodItem">Food item:</label>
        <select name="foodItem" id="foodItem">
            <?= $options ?>
        </select><br><br>
        <label for="Quantity">Quantity:</label>
        <input type="text" name="Quantity" id="ََQuantity" maxlength="2" required><br><br>
        <button type="submit">Order</button>
    </form>
</body>
</html>
