<?php
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "remittance";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        die("Database connection failed! " .
            mysqli_connect_error() .
            " (" .mysqli_connect_errno() . ")"
        );
    } else {
        //$msg = "Success!";
        //printf("%s\n", $msg);
    }
?>