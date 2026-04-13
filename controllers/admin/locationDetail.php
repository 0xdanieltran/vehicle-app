<?php
include_once 'models/users.php';
include_once 'models/devices.php';

$location_id = isset($_GET['id']) ? $_GET['id'] : $_POST['location_id'];
$user_fullname = $_SESSION['user_fullname'];

$field = "location_id = '" . $location_id . "'";
$users = get_user_by_field($conn, $field);
$devices = get_device_by_field($conn, $field);

$field = "role = 500 AND location_id IS NULL ";
$allUsers = get_user_by_field($conn, $field);

$field = "location_id IS NULL ";
$allDevices = get_device_by_field($conn, $field);

if (isset($_POST['user_modify'])) {
    $user_id = $_POST['userid'];
    $location_id = $_POST['location_id'];

    if (add_location_toUser($conn, $user_id, $location_id)) {
        echo json_encode(array("status" => true, "message" => "Upload Success"));
        return;
    } else {
        echo json_encode(array("status" => false, "message" => "Upload Failed"));
        return;
    }

} else if(isset($_POST['device_modify'])){
    $device_id = $_POST['deviceId'];
    $location_id = $_POST['location_id'];

    if (add_location_toDevice($conn, $device_id, $location_id)) {
        echo json_encode(array("status" => true, "message" => "Upload Success"));
        return;
    } else {
        echo json_encode(array("status" => false, "message" => "Upload Failed"));
        return;
    }

} else if (isset($_POST['device_id'])) {
    $device_id = $_POST['device_id'];

    if (remove_device($conn, $device_id)) {
        echo json_encode(array("status" => true, "message" => "Upload Success"));
        return;
    } else {
        echo json_encode(array("status" => false, "message" => "Upload Failed"));
        return;
    }
} else {
    
    include 'views/pages/admin/locationDetail.php';
}
