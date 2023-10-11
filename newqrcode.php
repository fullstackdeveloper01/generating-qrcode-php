<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');

// Include the qrlib file
include 'phpqrcode/qrlib.php';
if(isset($_REQUEST['qrcode']) && !empty($_REQUEST['qrcode']))
{
     
 $url = $_REQUEST['qrcode'];
// $path variable store the location where to 
// store image and $file creates directory name
// of the QR code file by using 'uniqid'
// uniqid creates unique id based on microtime

$path = 'images/';
$path = 'D:/wamp/www/qr_code/public/uploads/qrcodes/';
$pathname = 'qrcode-' .uniqid().'-'.time() . '.png';
$file = $path.$pathname;
  
// $ecc stores error correction capability('L')
$ecc = 'L';
$pixel_Size = 10;
$frame_size = 5;
  
try { 
    $qrocode = QRcode::png($url, $file, $ecc, $pixel_Size, $frame_size);
    //code...
    echo json_encode(['status'=> 1, 'fileurl' => $file, 'filename' => $pathname]); die; 

} catch (Exception $e) {  
    echo json_encode(['status'=> 0, 'fileurl' => '', 'filename' => '']); die;
} 
}else{
    echo json_encode(['status'=> 0, 'fileurl' => '', 'filename' => '']); die;
}
?>