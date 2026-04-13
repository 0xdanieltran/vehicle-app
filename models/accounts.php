<?php

function add_account($conn, $accounts)
{
    // Get the total number of results
    $account_name = $accounts[0];
    $account_fullname = $accounts[1];
    $location = !empty($accounts[2]) ? $accounts[2] : 'null';

    $res = pg_query($conn, ("INSERT INTO tbl_account (account_name, account_fullname, flag_del, avatar_name) VALUES ('".$account_name."', '".$account_fullname."', 0, '".$location."')"));

    if ($res) {

        $is_inserted = true;

    } else {

        echo pg_last_error($conn) . " <br />";
        $is_inserted = false;

    }

    return $is_inserted;
}

function count_accounts($conn, $filter){
	// Get the total number of results
	if($filter){

        $sql_where = " AND (LOWER(ta.account_name) like LOWER('%".$filter."%') OR LOWER(ta.account_fullname) like LOWER('%".$filter."%') OR LOWER(tu.user_fullname) like LOWER('%".$filter."%') OR LOWER(tu.email) like LOWER('%".$filter."%')) AND ta.flag_del = 0";

    }
    else{

        $sql_where = " AND ta.flag_del = 0";
    }

	$result = pg_query($conn, "SELECT COUNT(*) FROM tbl_account as ta LEFT JOIN tbl_user AS tu ON ta.id = tu.account_id WHERE tu.role = 300 ".$sql_where);
	
	return (int)pg_fetch_result($result, 0, 0);

}

function get_accounts_paging($conn,$page,$count_per_page, $filter) {
	if($filter){
        $sql_where = " AND (LOWER(ta.account_name) like LOWER('%".$filter."%') OR LOWER(ta.account_fullname) like LOWER('%".$filter."%') OR LOWER(tu.user_fullname) like LOWER('%".$filter."%') OR LOWER(tu.email) like LOWER('%".$filter."%')) AND ta.flag_del = 0";
    }
    else{
        $sql_where = " AND ta.flag_del = 0";
    }

	$offset = ($page - 1) * $count_per_page;
    if($offset < 0)
        $offset = 0;

	$sql = "SELECT ta.*, tu.user_fullname, tu.email, tu.created_at FROM tbl_account as ta LEFT JOIN tbl_user AS tu ON ta.id = tu.account_id WHERE tu.role = 300 ".$sql_where." ORDER BY ta.id LIMIT  $count_per_page offset $offset" ;
	
    //print_r($sql);
	$result = pg_query($conn,$sql);
	if (!$result) {
	    echo "An error occurred.\n";
	    exit;
	}
	$accounts = pg_fetch_all($result);

	return $accounts;
}

function get_account_id($conn, $accounts){

    $account_name = $accounts[0];
    $account_fullname = $accounts[1];

    $res = pg_query($conn, ("SELECT id FROM tbl_account WHERE account_name='$account_name' and account_fullname='$account_fullname'"));
    $res = pg_fetch_array($res);
    $id = $res[0];

    return $id;
}

function get_account_name($conn, $id){

    $res = pg_query($conn, ("SELECT account_name FROM tbl_account WHERE id ='$id'"));
    $res = pg_fetch_array($res);
    $account_name = $res[0];

    return $account_name;
}

function delete_account($conn, $id){

    $sql = "UPDATE tbl_account SET flag_del = 1 WHERE id=".$id;
    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function update_account($conn, $id, $account_name, $account_fullname, $img_url){
    $sql = "UPDATE tbl_account SET account_name = '".$account_name."' , account_fullname = '".$account_fullname."', avatar_name = '".$img_url."'  WHERE id=".$id;
    
    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function get_all_accounts($conn)
{
    $result = pg_query($conn, ("SELECT * FROM tbl_account"));

    if (!$result) {
	    echo "An error occurred.\n";
	    exit;
	}

    $accounts = pg_fetch_all($result);
    return $accounts;
}

function get_imageUrl($conn, $id)
{    
    $result = pg_query($conn, ("SELECT avatar_name FROM tbl_account WHERE id = ".$id));

    $res = pg_fetch_array($result);

    if($res)
        $avatar_name = $res[0];
    else
        $avatar_name = 'views/images/logo.png';
    
    return $avatar_name;
}
