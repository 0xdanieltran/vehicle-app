<?php
include_once('models/devices.php');
include_once('models/locations.php');

if (isset($_POST['serial_num'], $_POST['location_id'])){

    $device[0] = $_POST['serial_num'];
    $device[1] = $_SESSION['accountID'];
    $device[2] = $_POST['location_id'];
    $device[3] = date('Y/m/d H:i:s');
    $device[4] = 0;

    $res = add_device($conn, $device);

    if($res)
        echo true;
    else
        echo false;
}