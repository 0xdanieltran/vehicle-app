<?php
function get_searchResult($conn, $location_id, $reg_num, $visit_date) {

	
	if($visit_date == '')
		$sql = "SELECT * FROM tbl_snapshot WHERE location_id = ".$location_id." AND license_plate = '".$reg_num."' ORDER  BY id";
	else
		$sql = "SELECT * FROM tbl_snapshot WHERE location_id = ".$location_id." AND  DATE(upload_time) = '".$visit_date."' ORDER  BY id";
	
	$result = pg_query($conn,$sql);
	if (!$result) {
	    echo "An error occurred.\n";
	    exit;
	}

	$snapshots = pg_fetch_all($result);
	
	return $snapshots;
}

function get_reg_num($conn, $snapshot_id){

	$sql = "SELECT license_plate FROM tbl_snapshot WHERE id = ".$snapshot_id;
	$result = pg_query($conn,$sql);

	if (!$result) {
	    echo "An error occurred.\n";
	    exit;
	}

	$reg_num = pg_fetch_result($result, 0, 0);
	
	return $reg_num;
}

function get_upload_time($conn, $snapshot_id){

	$sql = "SELECT upload_time FROM tbl_snapshot WHERE id = ".$snapshot_id;
	$result = pg_query($conn,$sql);

	if (!$result) {
	    echo "An error occurred.\n";
	    exit;
	}

	$upload_time = pg_fetch_result($result, 0, 0);
	
	return $upload_time;
}

function get_count_snapshots($conn, $location_id){

    $sql = "SELECT COUNT(res.license_plate)
			 FROM (SELECT COUNT(license_plate), license_plate, date(upload_time)
			 		 FROM tbl_snapshot
					   WHERE date_part('month', upload_time) = date_part('month', now()) - 1 AND location_id = ".$location_id."
					    GROUP BY license_plate, date(upload_time)
						 ORDER BY date) as res";

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }

    $count = pg_fetch_result($result, 0, 0);
    return $count;
}