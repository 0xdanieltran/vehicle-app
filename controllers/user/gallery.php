<?php
include_once 'models/snapshots.php';
$user_fullname = $_SESSION['user_fullname'];
if (isset($_GET['type'], $_POST['downloadPath'])) {

    $path = $_POST['downloadPath'];

    $array = explode("/", $path);
    $filename = $array[count($array) - 1];
    $downloadName = explode(".", $filename)[0];

    if (is_file($path)) {
        $zipcreated = "./download/".$downloadName . ".zip";

        // Create new zip class
        $zip = new ZipArchive;

        if ($zip->open($zipcreated, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($path, $filename);
            $zip->close();
            
            if (file_exists($zipcreated)) {
                echo json_encode(['filename' => $zipcreated, 'result' => true]);
            }
        }
       
    } else {
        $zipcreated = "./download/download1.zip";

        // Create new zip class
        $zip = new ZipArchive;
        
        if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) {
            
            // Store the path into the variable
            $dir = opendir($path);
            
            while($file = readdir($dir)) {
                if(is_file($path.$file)) {
                    $zip -> addFile($path.$file, basename($file));
                }
            }
            $zip ->close();
            
            if (file_exists($zipcreated)) {
                echo json_encode(['filename' => $zipcreated, 'result' => true]);
            }
        }
    }

    return false;
} else {
    $snapshot_id = isset($_GET['snapshot_id']) ? $_GET['snapshot_id'] : '';
    $reg_num = get_reg_num($conn, $snapshot_id);

    $upload_time = get_upload_time($conn, $snapshot_id);
    $location_id = $_SESSION['location_id'];

    $snapshots = get_searchResult($conn, $location_id, $reg_num, '');
    include 'views/pages/user/gallery.php';
}

// Download Created Zip file
//   if(isset($_POST['download'])){

//     $filename = "myzipfile.zip";

//     if (file_exists($filename)) {
//        header('Content-Type: application/zip');
//        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
//        header('Content-Length: ' . filesize($filename));

//        flush();
//        readfile($filename);
//        // delete file
//        unlink($filename);

//      }
//   }
