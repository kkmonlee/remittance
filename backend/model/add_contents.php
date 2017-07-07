<?php
    require_once 'dbconnect.php';

    $raw_content = $_GET['content'];
    $sender_num = $_GET['from'];
    $split_content = explode(" ", urldecode($raw_content));
    // $split_content[0] is keyword which is AFRICA
    $food_items = $split_content[1];
    $centre_id = $split_content[2];
    $relative_num = $split_content[3];

    $stmt = "INSERT INTO shopping (sender_num, food, centre_id, relative_num) " .
            " VALUES('$sender_num', '$food_items', $centre_id, '$relative_num' )";

    //$stmt = "INSERT INTO shopping SET id=1, sender_num={$sender_num}, food={$food_items}, centre_id={$centre_id}, relative_num={$relative_num}";
    
    $result = mysqli_query($conn, $stmt);
    if ($result) {
        header("HTTP/1.1 200 OK");
    } else {
        echo "Failed to insert! \n" . mysqli_error($conn) . "\n" . mysqli_errno();
    }
?>