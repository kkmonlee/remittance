<?php
    require_once  'dbconnect.php';
    
    $query = "SELECT * FROM shopping";

    $response = array();
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>