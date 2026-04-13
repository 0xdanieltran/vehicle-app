$(document).ready(function () {
    $(".user_list_btn").click(function () {
        window.location = 'index.php?controller=sysadmin/userList';
    });

    $(".new_user_btn").click(function () {
        console.log("Add User");
        window.location = 'index.php?controller=sysadmin/newUser';
    });

    $(".account_list_btn").click(function () {
        window.location = 'index.php?controller=sysadmin/accountList';
    });

    $(".new_account_btn").click(function () {
        window.location = 'index.php?controller=sysadmin/newAccount';
    });

    $(".setting").click(function () {
        window.location = 'index.php?controller=sysadmin/deviceList';
    });

    $(".server").click(function () {
        window.location = 'index.php?controller=sysadmin/serverList';
    });

    $(".report_btn").click(function () {
        window.location = 'index.php?controller=sysadmin/reportList';
    });
  });