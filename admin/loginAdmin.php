<?php
session_start();
require '../config.php';
$office_id = $_SESSION["id"];
$sql =         "SELECT *
                FROM office_accounts
                WHERE office_id = '$office_id';";

if(!empty($_SESSION["id"])) {
    header("Location: dashboard.php");
}
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM office_accounts WHERE Email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["office_id"];
            header("Location: dashboard.php");
        } else {
            echo
            "<script> alert('wrong password');</script>";
            header("Location: loginAdmin.php");
        }
    }else {
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}

?>