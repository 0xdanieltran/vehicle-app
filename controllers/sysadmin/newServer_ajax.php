<?php
include_once('models/servers.php');

if(isset($_POST['modify'])){
    $id = $_POST['id'];
    $serverName = $_POST['serverName'];
    $serverUrl = $_POST['serverUrl'];
    $bucketName = $_POST['bucketName'];
    $accessKey = $_POST['accessKey'];
    $secretKey = $_POST['secretKey'];
    $writtable = $_POST['writable'] == "on" ? 'true' : 'false';

    $res = update_server($conn, $id, $serverName, $serverUrl, $bucketName, $accessKey, $secretKey, $writtable);

    if($res){
        echo true;
        return;
    }
    else{
        echo false;
        return;
    }
        
}
if (isset($_POST['serverName'], 
          $_POST['serverUrl'],
          $_POST['bucketName'],
          $_POST['accessKey'],
          $_POST['secretKey'],
          $_POST['writable'])) 
    {
        $servers[0] = $_POST['serverName'];
        $servers[1] = $_POST['serverUrl'];
        $servers[2] = $_POST['bucketName'];
        $servers[3] = $_POST['accessKey'];
        $servers[4] = $_POST['secretKey'];
        $servers[5] = date('Y/m/d H:i:s');
        $servers[6] = 0;
        $servers[7] = $_POST['writable'] == "on" ? 'true' : 'false';
        
        $res = add_server($conn, $servers);        

        if($res)
            echo true;
        else
            echo false;
    }
?>
