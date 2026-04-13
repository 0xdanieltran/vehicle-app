<?php
    include_once 'models/accounts.php';
    
    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    if(isset($_GET['del'])){
        delete_account($conn, $_GET['del']);
    }

    $countPerPage = 10;
    $totalResultCount = count_accounts($conn, $filter);
    
    // The ceil function will round floats up.
    $numberOfPages = ceil($totalResultCount / $countPerPage);

    // Check that the page is within our bounds
    if ($page < 0) {
        $page = 1;
    } elseif ($page > $numberOfPages) {
        $page = $numberOfPages;
    }

    $accounts = get_accounts_paging($conn, $page, $countPerPage, $filter);
    include_once 'views/pages/sysadmin/accountList.php';
?>
