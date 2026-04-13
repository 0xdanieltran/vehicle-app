<?php
    include_once('models/locations.php');
    include_once('models/snapshots.php');

    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $countPerPage = 10;
    $totalResultCount = count_locations($conn);

    // The ceil function will round floats up.
    $numberOfPages = ceil($totalResultCount / $countPerPage);

    // Check that the page is within our bounds
    if ($page < 0) {
        $page = 1;
    } elseif ($page > $numberOfPages) {
        $page = $numberOfPages;
    }

    $reports = get_all_locations_paging($conn, $page, $countPerPage);
    
    for($i = 0; $i < count($reports); $i++){
        $count = get_count_snapshots($conn, $reports[$i]['id']);
        $reports[$i]['events'] = $count;
    }
    include 'views/pages/sysadmin/reportList.php';
