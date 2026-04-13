<?php
include_once('models/locations.php');

if (isset($_POST['location_name'])){

    $location[0] = $_POST['location_name'];
    $location[1] = $_SESSION['id'];
    $location[2] = 0;
    $location[3] = date('Y/m/d H:i:s');
    $location[4] = $_SESSION['accountID'];

    $res = add_location($conn, $location);

    if($res)
        echo true;
    else
        echo false;
}