<?php
function add_server($conn, $data)
{
    // Get the total number of results
    $res = pg_query($conn, ("INSERT INTO tbl_server (server_name, server_url, bucket_name, access_key, secret_access_key, created_at, flag_del, writtable)
        VALUES ('".$data[0]."','".$data[1]."', '".$data[2]."', '".$data[3]."', '".$data[4]."', '".$data[5]."', '".$data[6]."', '".$data[7]."')"));

    if ($res) {

        $is_inserted = true;

    } else {
        echo pg_last_error($conn) . " <br />";
        $is_inserted = false;
    }

    return $is_inserted;
}


function count_servers($conn){
	// Get the total number of results
	$result = pg_query($conn, "SELECT count(*) FROM tbl_server WHERE flag_del = 0"); 
	return (int)pg_fetch_result($result, 0, 0);
}

function get_servers_paging($conn,$page,$count_per_page) {
	$offset = ($page-1) * $count_per_page;
    if($offset < 0)
        $offset = 0; 

	$sql = "SELECT * FROM tbl_server WHERE flag_del = 0 ORDER  BY id LIMIT  $count_per_page offset $offset";
	
	$result = pg_query($conn,$sql);
	if (!$result) {
	    echo "An error occurred.\n";
	    exit;
	}
	$servers = pg_fetch_all($result);
	
	return $servers;

}

function delete_server($conn, $id){

    $sql = "UPDATE tbl_server SET flag_del = 1 WHERE id=".$id;
    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function update_server($conn, $id, $serverName, $serverUrl, $bucketName, $accessKey, $secretKey, $writtable)
{
    $sql = "UPDATE tbl_server SET server_name = '".$serverName."', server_url = '".$serverUrl."', bucket_name='".$bucketName."', access_key='".$accessKey."', secret_access_key='".$secretKey."', writtable= $writtable WHERE id=".$id;
    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}
