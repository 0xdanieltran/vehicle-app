<?php

function send_mail($userMail, $userId)
{
    $url = "http://70.34.252.244/vehicle/?aaa=".base64_encode('http://70.34.252.244/vehicle/index.php?controller=login/register&userId='.$userId);

/** Send Mail Function */
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://easymail.p.rapidapi.com/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\r
        \"from\": {\r
            \"name\": \"CarEye\"\r
        },\r
        \"to\": {\r
            \"name\": \"\",\r
            \"address\": \"$userMail\"\r
        },\r
        \"subject\": \"Recovery Email\",\r
        \"message\": \"Witaj, <br>możesz ustawić swoje hasło odwiedzając ten link: $url\",\r
        \"show_noreply_warning\": false\r
        }",
        CURLOPT_HTTPHEADER => [
            "content-type: application/json",
            "x-rapidapi-host: easymail.p.rapidapi.com",
            "x-rapidapi-key: 353783d454mshd1387cdf3a3ab33p112805jsnb42e452478c4",
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo false;
    } else {
        echo true;
    }
}
