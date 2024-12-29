<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<p>Invalid access method. Please submit the form properly.</p>";
}
if (!isset($_POST['foodItem']) || !isset($_POST['Quantity'])<= 0) {
    echo "<p>Invalid input</p>";
}
$food_item = $_POST['foodItem'];
$quantity = intval($_POST['Quantity']);
$conn = new mysqli("localhost", "", "", "");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn,"SELECT quantity, price FROM items WHERE name = '$food_item'");
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) < 0) {
    echo "<p>Sorry, we don't have '$food_item' in stock.</p>";
} else {
    $availableQuantity = intval($row['ََQuantity']);
    $price_per_unit = floatval($row['price']);

    if ($quantity > $availableQuantity) {
        echo "<p>Sorry, we don't have enough '$food_item' in stock to fulfill your order.</p>";
    } else {
        $total_cost = $quantity * $price_per_unit;
        echo "<p>Total cost: $" . number_format($total_cost, 2) . "</p>";
    }
}
$conn->close();
?>
