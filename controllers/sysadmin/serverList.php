<?php
    include_once('models/servers.php');

    if(isset($_POST['id'])){
        if(delete_server($conn, $_POST['id'])){
            echo json_encode(array("status" => true, "message" => "Delete Success"));
        }else{
            echo json_encode(array("status" => false, "message" => "Delete Failed"));
        }
        return;
    }
    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;


    $countPerPage = 10;
    $totalResultCount = count_servers($conn, $filter);

    // The ceil function will round floats up.
    $numberOfPages = ceil($totalResultCount / $countPerPage);

    // Check that the page is within our bounds
    if ($page < 0) {
        $page = 1;
    } elseif ($page > $numberOfPages) {
        $page = $numberOfPages;
    }

    $servers = get_servers_paging($conn, $page, $countPerPage, $filter);
    include_once 'views/pages/sysadmin/serverList.php';
?>