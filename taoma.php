<?php 
session_start();
create_image(); 
exit(); 
function create_image() 
{ 
    $md5_hash = md5(rand(0,999)); 
    $code = substr($md5_hash, 15, 5); 
    $_SESSION["code"] = $code;
    $width = 100; 
    $height = 30;  
    $image = ImageCreate($width, $height);  
    $white = ImageColorAllocate($image, 255, 255, 255); 
    $black = ImageColorAllocate($image, 0, 0, 0); 
    ImageFill($image, 0, 0, $black); 
    ImageString($image, 5, 30, 6, $code, $white); 
    header("Content-Type: image/jpeg"); 
    ImageJpeg($image); 
    ImageDestroy($image); 
} 
?>