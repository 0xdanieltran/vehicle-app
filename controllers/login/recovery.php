<?php
include_once 'models/users.php';
include_once('models/mailer.php');

if (isset($_POST['userMail'])) {
    $userMail = $_POST['userMail'];
    $field = "email = '".$userMail."'";
    $user = get_user_by_field($conn, $field);
    $userId = $user[0]['id'];
    
    if(send_mail($userMail, $userId)) {
        echo true;
    } else {
        echo false;
    }
}
