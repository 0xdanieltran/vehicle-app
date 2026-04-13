<?php
    include('models/locations.php');
    $user_fullname = $_SESSION['user_fullname'];
    $locations = get_all_locations($conn);
    include('views/pages/admin/newDevice.php');
?>