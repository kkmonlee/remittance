<?php
    require_once 'dbconnect.php';

    $message = "The+payment+for+your+shopping+list+has+been+successful!+Please+collect+your+items+at+Centre+11096+with+UniqueID+132.+From+447712277220.";
    $api_key = "ab13673024f9a6e70578f11169b81e55d89c9a91";
    $african_num = "447767797808";
    
    $url = "https://api.clockworksms.com/http/send.aspx?key=" . $api_key . "&to=" . $african_num . "&content=" . $message;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

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