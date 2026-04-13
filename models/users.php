<?php
function count_users($conn, $filter, $is_sysadmin)
{
    // Get the total number of results
    if ($filter) {
        $sql_where = "AND (LOWER(tu.user_name) like LOWER('%" . $filter . "%') OR LOWER(tu.user_fullname) like LOWER('%" . $filter . "%') OR LOWER(tu.email) like LOWER('%" . $filter . "%') OR LOWER(tl.location_name) LIKE LOWER('%" . $filter . "%') ) AND tu.flag_del = 0";
    } else {
        $sql_where = "AND tu.flag_del = 0";
    }

    if($is_sysadmin)
        $sql = "SELECT COUNT(*) FROM tbl_user as tu LEFT JOIN tbl_account AS ta ON ta.id = tu.account_id LEFT JOIN tbl_location AS tl ON tl.id = tu.location_id WHERE role<>100 AND role<>200 " . $sql_where;
    else
        $sql = "SELECT COUNT(*) FROM tbl_user as tu LEFT JOIN tbl_account AS ta ON ta.id = tu.account_id LEFT JOIN tbl_location AS tl ON tl.id = tu.location_id WHERE tu.creator_id =" . $_SESSION['id'] . " AND role<>100 " . $sql_where;

    $result = pg_query($conn, $sql);

    return (int) pg_fetch_result($result, 0, 0);

}
function get_users_paging($conn, $page, $count_per_page, $filter, $is_sysadmin)
{
    if ($filter) {
        $sql_where = " AND (LOWER(tu.user_name) like LOWER('%" . $filter . "%') OR LOWER(tu.user_fullname) like LOWER('%" . $filter . "%') OR LOWER(tu.email) like LOWER('%" . $filter . "%') OR LOWER(tl.location_name) LIKE LOWER('%" . $filter . "%')) AND tu.flag_del = 0";
    } else {
        $sql_where = " AND tu.flag_del = 0";
    }

    $offset = ($page - 1) * $count_per_page;
    if ($offset < 0) {
        $offset = 0;
    }

    if($is_sysadmin)
        $sql = "SELECT tu.*, ta.account_name, ta.account_fullname, tl.location_name FROM tbl_user as tu LEFT JOIN tbl_account AS ta ON ta.id = tu.account_id LEFT JOIN tbl_location AS tl ON tl.id = tu.location_id WHERE role<>100 AND role<>200 " . $sql_where . " ORDER BY tu.id LIMIT  $count_per_page offset $offset";
    else
        $sql = "SELECT tu.*, ta.account_name, ta.account_fullname, tl.location_name FROM tbl_user as tu LEFT JOIN tbl_account AS ta ON ta.id = tu.account_id LEFT JOIN tbl_location AS tl ON tl.id = tu.location_id WHERE tu.creator_id =" . $_SESSION['id'] . "" . $sql_where . " ORDER BY tu.id LIMIT  $count_per_page offset $offset";

    //print_r($sql);
    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    $users = pg_fetch_all($result);

    return $users;
}

function add_user($conn, $user)
{
    $res = pg_query($conn, ("INSERT INTO tbl_user (user_name, user_fullname, account_id, location_id, flag_del, role, created_at, creator_id, email)
                            VALUES ('" . $user[0] . "','" . $user[1] . "', '" . $user[2] . "', " . $user[3] . ", '" . $user[4] . "', '" . $user[5] . "', '" . $user[6] . "', '" . $user[7] . "', '" . $user[8] . "')")); //.$_SESSION['id']."', '".$id."', 0)

    return $res;
}

function add_admin($conn, $user)
{
    $res = pg_query($conn, ("INSERT INTO tbl_user (user_name, user_fullname, account_id, location_id, flag_del, role, created_at, creator_id, email, password)
                            VALUES ('" . $user[0] . "','" . $user[1] . "', '" . $user[2] . "', " . $user[3] . ", '" . $user[4] . "', '" . $user[5] . "', '" . $user[6] . "', '" . $user[7] . "', '" . $user[8] . "', '" . $user[9] . "')")); //.$_SESSION['id']."', '".$id."', 0)

    return $res;
}

function get_all_users($conn)
{
    $sql = "SELECT tu.*, ta.account_name, ta.account_fullname FROM tbl_user as tu LEFT JOIN tbl_account AS ta ON ta.id = tu.account_id WHERE tu.creator_id =" . $_SESSION['id'] . " ORDER BY tu.id";

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    $users = pg_fetch_all($result);

    return $users;
}

function delete_user($conn, $id)
{

    $sql = "UPDATE tbl_user SET flag_del = 1 WHERE id=" . $id;
    $result = pg_query($conn, $sql);

    if (!$result) {
        return false;
    }

    return true;
}

function get_user_by_field($conn, $field)
{
    $sql = "SELECT * FROM tbl_user WHERE " . $field;

    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }

    $users = pg_fetch_all($result);

    return $users;
}

function update_user_info($conn, $mail, $password)
{
    $sql = "UPDATE tbl_user SET password = md5('" . $password . "') WHERE email='" . $mail . "'";

    $result = pg_query($conn, $sql);
    if (!$result) {
        return false;
    }

    return true;
}

function get_id_byEmail($conn, $mail)
{
    $sql = "SELECT id FROM tbl_user WHERE email='".$mail."'";

    $result = pg_query($conn, $sql);
    
    if (!$result) {
        return -1;
    }

    return (int) pg_fetch_result($result, 0, 0);
}

function get_default_superadmin($conn)
{
    $sql = "SELECT id FROM tbl_user WHERE account_id = 1 AND role = 100";

    $result = pg_query($conn, $sql);

    if (!$result) {
        return -1;
    }

    return (int) pg_fetch_result($result, 0, 0);
}

function update_user($conn, $id, $user_name, $user_fullname, $email){
    $sql = "UPDATE tbl_user SET user_name = '".$user_name."', user_fullname = '".$user_fullname."', email = '".$email."' WHERE id=" . $id;

    $result = pg_query($conn, $sql);
    if (!$result) {
        return false;
    }

    return true;
}

function add_location_toUser($conn, $user_id, $location_id)
{
    $sql = "UPDATE tbl_user SET location_id = ".$location_id." WHERE id=" . $user_id;

    $result = pg_query($conn, $sql);
    if (!$result) {
        return false;
    }

    return true;
}