<?php
    include_once('models/locations.php');
    $user_fullname = $_SESSION['user_fullname'];
    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    if(isset($_GET['del'])){
        delete_location($conn, $_GET['del']);
    }

    $countPerPage = 10;
    $totalResultCount = count_locations($conn, $filter);
    
    // The ceil function will round floats up.
    $numberOfPages = ceil($totalResultCount / $countPerPage);

    // Check that the page is within our bounds
    if ($page < 0) {
        $page = 1;
    } elseif ($page > $numberOfPages) {
        $page = $numberOfPages;
    }
    
    $locations = get_locations_paging($conn, $page, $countPerPage, $filter);
    include_once 'views/pages/admin/locationList.php';