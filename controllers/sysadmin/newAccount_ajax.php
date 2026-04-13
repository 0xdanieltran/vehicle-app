<?php
include_once 'models/users.php';
include_once 'models/accounts.php';
include_once 'models/mailer.php';

$valid_extensions = array('jpeg', 'jpg', 'png');
$path = 'uploads/'; // upload directory

if(isset($_POST['modify'])){
    $filename = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : $_POST['url'];
    
    if (!empty($filename) && isset($_FILES['file']['name'])) {

        /* Choose where to save the uploaded file */
        $location = "upload/" . $filename;

        if ($_FILES['file']['size'] > 1048576) {
            echo json_encode(array("status" => false, "message" => "File size must be excately 1 MB"));
            return;
        }

        $allowed = array('jpeg', 'png', 'jpg');
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            echo json_encode(array("status" => false, "message" => "File extension must be jpg or png"));
            return;
        }

        /* Save the uploaded file to the local filesystem */
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            echo json_encode(array("status" => false, "message" => "Upload Failed"));
            return;
        }
    }

    $id = $_POST['id'];
    $account_name = $_POST['account_name'];
    $account_fullname = $_POST['account_fullname'];
    $img_url = isset($location) ? $location : $filename;

    update_account($conn, $id, $account_name, $account_fullname, $img_url);

    echo json_encode(array("status" => true, "message" => "Upload Success"));
    return;

}else
if (isset($_POST['account_name'],
    $_POST['account_fullname'],
    $_POST['user_name'],
    $_POST['user_email'],
    $_POST['user_fullname'])) {
    
    $filename = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
    if (!empty($filename)) {

        /* Choose where to save the uploaded file */
        $location = "upload/" . $filename;

        if ($_FILES['file']['size'] > 1048576) {
            echo json_encode(array("status" => false, "message" => "File size must be excately 1 MB"));
            return;
        }

        $allowed = array('jpeg', 'png', 'jpg');
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            echo json_encode(array("status" => false, "message" => "File extension must be jpg or png"));
            return;
        }

        /* Save the uploaded file to the local filesystem */
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            echo json_encode(array("status" => false, "message" => "Upload Failed"));
            return;
        }
    }

    $account_name = $_POST['account_name'];
    $account_fullname = $_POST['account_fullname'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_fullname = $_POST['user_fullname'];

    $accounts[0] = $account_name;
    $accounts[1] = $account_fullname;
    $accounts[2] = isset($location) ? $location : 'null';

    if (!add_account($conn, $accounts)) {

        echo json_encode(array("status" => false, "message" => "add account failed"));
        return;
    }

    $accountId = get_account_id($conn, $accounts);

    $user[0] = $user_name;
    $user[1] = $user_fullname;
    $user[2] = $accountId;
    $user[3] = 'null';
    $user[4] = 0;
    $user[5] = 300;
    $user[6] = date('Y/m/d H:i:s');
    $user[7] = $_SESSION['id'];
    $user[8] = $user_email;

    $res = add_user($conn, $user);

    $id = get_id_byEmail($conn, $user[8]);
    
    if ($res && send_mail($user_email, $id)) { 
        echo json_encode(array("status" => true, "message" => "account register successfully1"));
        return;
    } else {
        echo json_encode(array("status" => false, "message" => "account register failed"));
        return;
    }
}
