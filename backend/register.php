<?php
    require_once 'dbconnect.php';

    $phone_num = $_GET['phone'];
    $password = $_GET['password'];

    $stmt = "INSERT INTO users (phone_num, password) VALUES('$phone_num', '$password')";

    $result = mysqli_query($conn, $stmt);
    if ($result) {
        header("HTTP/1.1 200 OK");
        echo "Success!";
    } else {
        echo "Failed to register! \n" . mysqli_error($conn) . "\n" . mysqli_errno();
    }
?>