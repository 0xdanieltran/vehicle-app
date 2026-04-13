<?php
include_once 'models/accounts.php';

if (isset($_POST['username'], $_POST['password'])) {
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $res_name = pg_query($conn, ("SELECT * FROM tbl_user WHERE user_name='$username' AND password='$password'"));
    $res_email = pg_query($conn, ("SELECT * FROM tbl_user WHERE email='$username' AND password='$password'"));

    if (pg_num_rows($res_name) > 0 || pg_num_rows($res_email) > 0) {
        $message_ok = true;
        $user_list = pg_num_rows($res_name) > 0 ? pg_fetch_array($res_name) : pg_fetch_array($res_email);
        $_SESSION['id'] = $user_list[0];
        $_SESSION['user_name'] = $user_list[1];
        $_SESSION['user_fullname'] = $user_list[2];
        $_SESSION['accountID'] = $user_list[3];
        $_SESSION['location_id'] = $user_list[5];
        $_SESSION['role'] = $user_list[7];
        $_SESSION['password'] = $user_list[10];
        $_SESSION['email'] = $user_list[11];
        $_SESSION['url'] = get_imageUrl($conn, $user_list[3]);
        
        $json = array('success' => $message_ok, 'role' => $user_list[7]);
        echo json_encode($json);
    }

}
