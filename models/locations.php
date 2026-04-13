<?php
function add_location($conn, $data)
{
    // Get the total number of results
    $res = pg_query($conn, ("INSERT INTO tbl_location (location_name, creator_id, flag_del, created_at, account_id)
        VALUES ('" . $data[0] . "','" . $data[1] . "', '" . $data[2] . "', '" . $data[3] . "', '" . $data[4] . "')"));

    if ($res) {

        $is_inserted = true;

    } else {
        echo pg_last_error($conn) . " <br />";
        $is_inserted = false;
    }

    return $is_inserted;
}

function count_locations($conn, $filter = 'null')
{
    // Get the total number of results
    if ($filter) {
        $sql_where = " AND (LOWER(location_name) like LOWER('%" . $filter . "%')) AND flag_del = 0";
    } else {
        $sql_where = " AND flag_del = 0";
    }

    $userID = $_SESSION['id'];

    $result = pg_query($conn, "SELECT count(*) FROM tbl_location WHERE creator_id = $userID " . $sql_where);
    return (int) pg_fetch_result($result, 0, 0);
}

function get_locations_paging($conn, $page, $count_per_page, $filter='null')
{
    $offset = ($page - 1) * $count_per_page;
    if ($offset) {
        $offset = 0;
    }

    $userID = $_SESSION['id'];

    if ($filter) {
        $sql_where = " AND (LOWER(location_name) like LOWER('%" . $filter . "%')) AND flag_del = 0";
    } else {
        $sql_where = " AND flag_del = 0";
    }

    $sql = "SELECT * from tbl_location WHERE creator_id = $userID " . $sql_where . " ORDER  BY id LIMIT  $count_per_page offset $offset";

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    $locations = pg_fetch_all($result);

    return $locations;

}

function get_all_locations_paging($conn, $page, $count_per_page)
{
    $offset = ($page - 1) * $count_per_page;
    if ($offset) {
        $offset = 0;
    }

    $sql = "SELECT tl.*, ta.account_name FROM tbl_location AS tl LEFT JOIN  tbl_account AS ta ON ta.id = tl.account_id WHERE tl.flag_del = 0 ORDER  BY tl.id LIMIT  $count_per_page offset $offset";

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    $locations = pg_fetch_all($result);

    return $locations;

}

function get_all_locations($conn)
{

    $userID = $_SESSION['id'];
    $sql = "SELECT * from tbl_location WHERE creator_id = $userID AND flag_del = 0 ORDER  BY id";

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    $locations = pg_fetch_all($result);

    return $locations;

}

function get_location_id($conn, $location_name, $creator_id)
{
    $sql = "SELECT id from tbl_location WHERE creator_id = $creator_id and location_name = '$location_name'";

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }

    $res = pg_fetch_array($result);

    return $res[0];
}

function get_location_name($conn, $location_id, $creator_id)
{
    $sql = "SELECT location_name from tbl_location WHERE creator_id = $creator_id and id = '$location_id'";

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }

    $res = pg_fetch_array($result);

    return $res[0];
}

function delete_location($conn, $id)
{

    $sql = "UPDATE tbl_location SET flag_del = 1 WHERE id=" . $id;
    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}