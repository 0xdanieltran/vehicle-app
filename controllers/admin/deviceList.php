<?php
    include_once 'models/devices.php';
    include_once 'models/locations.php';

    if(isset($_POST['modify'])){

        $location_id = $_POST['location_id'];
        $id = $_POST['id'];
        
        if(select_location($conn, $id, $location_id)){
            echo json_encode(array("status" => true, "message" => "Upload Success"));
            return;
        }else{
            echo json_encode(array("status" => false, "message" => "Upload Failed"));
            return;
        }
    }else if (isset($_POST['removeId'])){
        
    }else{
        $user_fullname = $_SESSION['user_fullname'];
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
        $locations = get_all_locations($conn);
        include_once 'views/pages/admin/deviceList.php';
    }
?>