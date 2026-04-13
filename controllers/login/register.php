<?php
include_once 'models/users.php';

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $field = "id = $userId";

    $user = get_user_by_field($conn, $field)[0];
    include 'views/register.php';
}else
if (isset($_POST['password'], $_POST['email'])) {
    $password = $_POST['password'];
    $mail = $_POST['email'];
    $user = update_user_info($conn, $mail, $password);
    
    if ($user) {
        echo true;
    } else {
        echo false;
    }

}
