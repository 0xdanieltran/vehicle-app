<?php
include_once 'models/devices.php';
include_once 'models/accounts.php';

if(isset($_POST['modify'], $_POST['device_name'], $_POST['account_id'], $_POST['device_id'])){
    $device_name = $_POST['device_name'];
    $account_id = $_POST['account_id'];
    $id = $_POST['device_id'];
    
    if(update_device($conn, $id, $device_name, $account_id)){
        echo json_encode(array("status" => true, "message" => "Upload Success"));
        return;
    }else{
        echo json_encode(array("status" => false, "message" => "Upload Failed"));
        return;
    }       
}else{
    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    if(isset($_GET['del'])){
        delete_device($conn, $_GET['del']);
    }

    $countPerPage = 10;
    $totalResultCount = count_devices($conn, $filter);

    // The ceil function will round floats up.
    $numberOfPages = ceil($totalResultCount / $countPerPage);

    // Check that the page is within our bounds
    if ($page < 0) {
        $page = 1;
    } elseif ($page > $numberOfPages) {
        $page = $numberOfPages;
    }


    $devices = get_devices_paging($conn, $page, $countPerPage, $filter);
    $accounts = get_all_accounts($conn);

    include_once 'views/pages/sysadmin/deviceList.php';

}
