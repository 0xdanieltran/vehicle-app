<?php

function count_reports($conn){
	// Get the total number of results
	$result = pg_query($conn, "SELECT count(*) FROM tbl_report"); 
	return (int)pg_fetch_result($result, 0, 0);
}

function get_reports_paging($conn,$page,$count_per_page) {
	$offset = ($page-1) * $count_per_page;
    if($offset < 0)
        $offset = 0; 

	$sql = "SELECT * FROM tbl_report ORDER  BY id LIMIT  $count_per_page offset $offset";
	
	$result = pg_query($conn,$sql);
	if (!$result) {
	    echo "An error occurred.\n";
	    exit;
	}
	$servers = pg_fetch_all($result);
	
	return $servers;

}