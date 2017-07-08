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

    $message = "Your+relative+is+in+need+of+your+help.+Please+login+in+at+kkmonlee.com+if+you+have+an+account+to+see+the+items+and+pay.+Thanks!";
    $api_key = "ab13673024f9a6e70578f11169b81e55d89c9a91";
    $url = "https://api.clockworksms.com/http/send.aspx?key=" . $api_key . "&to=" . $relative_num . "&content=" . $message;
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);

    if (curl_errno($ch)) {
        die('Failed to send request ' . curl_error($ch));
    } else {
        $result_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($result_status == 200) {
            // all good
        } else {
            die('Request failed: HTTP status code ' . $result_status);
        }
    }

    curl_close($ch);
?>