<?php
    require_once 'dbconnect.php';
    
    $american_number = $_GET["american"];

    $query = "SELECT * FROM shopping WHERE relative_num = '$american_number'";

    $response = array();
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>