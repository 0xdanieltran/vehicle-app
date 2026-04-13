<?php
    include_once('models/locations.php');
    
    $locations = get_all_locations($conn);
    include('views/pages/sysadmin/newUser.php');
?>