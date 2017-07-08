<?php
    require_once 'dbconnect.php';

    if (isset($_GET['phone']) and isset($_GET['password'])) {
        $phone_num = $_GET['phone'];
        $password = $_GET['password'];
        $callback = $_GET['callback'];

        $query = "SELECT * FROM users WHERE phone_num = '$phone_num' AND password = '$password'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($connection));

        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $response = array(
                'status' => '1',
                'status_message' => 'Success'
            );
        } else {
            $response = array(
                'status' => '0',
                'status_message' => 'Fail'
            );
        }
    } else {
        die("Phone number and password empty!");
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>