<?php
include_once('models/users.php');
include_once('models/locations.php');
include_once('models/mailer.php');

if (isset($_POST['user_name'], $_POST['user_fullname'], $_POST['email'], $_POST['location_id'])){
    
    $user[0] = $_POST['user_name'];
    $user[1] = $_POST['user_fullname'];
    $user[2] = $_SESSION['accountID'];
    $user[3] = $_POST['location_id'];
    $user[4] = 0;
    $user[5] = $_POST['isAdmin'] == 'true' ? 400 : 500;
    $user[6] = date('Y/m/d H:i:s');
    $user[7] = $_SESSION['id'];
    $user[8] = $_POST['email'];
    
    $res = add_user($conn, $user);

    $id = get_id_byEmail($conn, $user[8]);

    if($res && $id >= 0) {
        send_mail($_POST['email'], $id);
        echo json_encode(array("status" => true, "message" => "user register successfully"));
        return;
    }
    else{
        echo json_encode(array("status" => false, "message" => "user register failed"));
        return;
    }    
}