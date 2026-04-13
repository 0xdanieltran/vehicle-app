<?php
include_once 'models/snapshots.php';

$user_fullname = $_SESSION['user_fullname'];
$location_id = isset($_GET['location_id']) ? $_GET['location_id'] : '';
$reg_num = isset($_GET['regi_num']) ? $_GET['regi_num'] : '';
$visit_date = isset($_GET['visit_date']) ? $_GET['visit_date'] : '';

$snapshots = get_searchResult($conn, $location_id, $reg_num, $visit_date);

if (is_countable($snapshots)) {
    include 'views/pages/user/searchResult.php';
} else {
    include 'views/pages/user/search.php';
}
