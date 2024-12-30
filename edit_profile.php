<?php
session_start();
require 'config.php';
if (empty($_SESSION["id"])) {
    header("Location: login.html");
    exit();
}
$customer_id = $_SESSION["id"];
if (isset($_POST["submit"])) {
    $updates = [];
    if (!empty($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
        $updates[] = "first_name = '$first_name'";
    }
    if (!empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
        $updates[] = "last_name = '$last_name'";
    }
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $updates[] = "Email = '$email'";
    }
    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
        $updates[] = "phone = '$phone'";
    }
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        $updates[] = "password = '$password'";
    }
    if (!empty($_POST['Location'])) {
        $address = $_POST['Location'];
        $updates[] = "address = '$address'";
    }
    if (!empty($updates)) {
        $sql = "UPDATE customer SET " . implode(', ', $updates) . " WHERE customer_id = '$customer_id'";
        if ($conn->query($sql) === TRUE) {
            header("Location: profile.php");

        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "No fields were updated.";
    }
}
?>