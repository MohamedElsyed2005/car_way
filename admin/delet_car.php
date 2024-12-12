<?php
    require '../config.php';


    if (isset($_GET['id'])) {
        $car_id = intval($_GET['id']);

        $sql = "DELETE FROM car WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);

    if ($stmt->execute()) {
        echo "Car deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
    $conn->close();
    ?>