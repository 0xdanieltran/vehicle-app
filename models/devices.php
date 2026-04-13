<?php
function add_device($conn, $data)
{
    // Get the total number of results
    $res = pg_query($conn, ("INSERT INTO tbl_device (serial_num, account_id, location_id, created_at, flag_del)
        VALUES ('" . $data[0] . "','" . $data[1] . "', '" . $data[2] . "', '" . $data[3] . "', '" . $data[4] . "')"));

    if ($res) {

        $is_inserted = true;

    } else {
        $is_inserted = false;
    }

    return $is_inserted;
}

function count_devices($conn, $filter)
{
    // Get the total number of results
    if($filter){
        $sql_where = " WHERE (LOWER(tl.location_name) like LOWER('%".$filter."%') OR LOWER(td.serial_num) like LOWER('%".$filter."%') OR LOWER(ta.account_name) like LOWER('%".$filter."%')) AND td.flag_del = 0";
    }
    else{
        $sql_where = " WHERE td.flag_del = 0";
    }

    $accountID = $_SESSION['accountID'];
    if (!($_SESSION['role'] == 100 || $_SESSION['role'] == 200)) {
        $sql_where = $sql_where." AND td.account_id = ".$accountID;
    }
    
    
    $result = pg_query($conn, "SELECT COUNT(*) from tbl_device as td LEFT JOIN tbl_location AS tl ON td.location_id = tl.id LEFT JOIN tbl_account AS ta ON td.account_id = ta.id".$sql_where);

    $count = pg_fetch_result($result, 0, 0);

    return $count;
}

function get_devices_paging($conn, $page, $count_per_page, $filter)
{

    if($filter)
        $sql_where = " WHERE (LOWER(tl.location_name) like LOWER('%".$filter."%') OR LOWER(td.serial_num) like LOWER('%".$filter."%') OR LOWER(ta.account_name) like LOWER('%".$filter."%')) AND td.flag_del = 0";
    else
        $sql_where = " WHERE td.flag_del = 0";

    $offset = ($page - 1) * $count_per_page;
    if($offset < 0)
        $offset = 0;

    $accountID = $_SESSION['accountID'];

    if ($_SESSION['role'] == 100 || $_SESSION['role'] == 200) {
        $sql = "SELECT td.*, tl.location_name, ta.account_name from tbl_device as td LEFT JOIN tbl_location AS tl ON td.location_id = tl.id LEFT JOIN tbl_account AS ta ON td.account_id = ta.id".$sql_where." ORDER  BY id LIMIT  $count_per_page offset $offset";
    } else {
        $sql_where = $sql_where." AND td.account_id = ".$accountID;
        $sql = "SELECT td.*, tl.location_name, ta.account_name from tbl_device as td LEFT JOIN tbl_location AS tl ON td.location_id = tl.id LEFT JOIN tbl_account AS ta ON td.account_id = ta.id".$sql_where." ORDER  BY id LIMIT  $count_per_page offset $offset";
    }

    //print_r($sql);
    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    $devices = pg_fetch_all($result);

    return $devices;

}

function delete_device($conn, $id){

    $sql = "UPDATE tbl_device SET flag_del = 1 WHERE id=".$id;
    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function update_device($conn, $id, $device_name, $account_id)
{
    $sql = "UPDATE tbl_device SET serial_num = '".$device_name."', account_id = '".$account_id."' WHERE id=".$id;

    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function select_location($conn, $id, $location_id)
{
    $sql = "UPDATE tbl_device SET location_id = '".$location_id."' WHERE id=".$id;

    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function get_device_by_field($conn, $field){
    $sql = "SELECT * FROM tbl_device WHERE " . $field;

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }

    $devices = pg_fetch_all($result);

    return $devices;
}

function remove_device($conn, $device_id){

    $sql = "UPDATE tbl_device SET location_id = NULL WHERE id=".$device_id;

    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function add_location_toDevice($conn, $device_id, $location_id)
{
    $sql = "UPDATE tbl_device SET location_id = ".$location_id." WHERE id=" . $device_id;

    $result = pg_query($conn, $sql);
    if (!$result) {
        return false;
    }

    return true;
}

