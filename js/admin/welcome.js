$(document).ready(function () {
// Add User Button Event
    $(".new_user_btn").on("click", function () {
        window.location = 'index.php?controller=admin/newUser';
    });
    // User List Button Event
    $(".user_list_btn").on("click", function () {
        window.location = 'index.php?controller=admin/userList';
    });

    // Add Location Button Event
    $(".new_location_btn").on("click", function () {
        window.location = 'index.php?controller=admin/newLocation';
    });
    // Location List Button Event
    $(".location_list_btn").on("click", function () {
        window.location = 'index.php?controller=admin/locationList';
    });

    // Add Device Button Event
    $(".new_device_btn").on("click", function () {
        window.location = 'index.php?controller=admin/newDevice';
    });
    // Device List Button Event
    $(".device_list_btn").on("click", function () {
        window.location = 'index.php?controller=admin/deviceList';
    });
});
    