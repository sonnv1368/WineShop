<?php   
function PIPHP_CreateGoogleChart($title, $tcolor, $tsize,$type, $bwidth, $labels, $legends, $colors, $bgfill,$border, $bcolor, $width, $height, $data)  
{  
   $types = array('line'    => 'lc',  
                  'vbar'    => 'bvg',  
                  'hbar'    => 'bhg',  
                  'gometer' => 'gom',  
                  'pie'     => 'p',  
                  'pie3d'   => 'p3',  
                  'venn'    => 'v',  
                  'radar'   => 'r');  
  
   if (!isset($types[$type])) $type = 'pie';  
  
   $tail  = "chtt=" . urlencode($title);  
   $tail .= "&cht=$types[$type]";  
   $tail .= "&chs=$width" . "x" . "$height";  
   $tail .= "&chbh=$bwidth";  
   $tail .= "&chxt=x,y";  
   $tail .= "&chd=t:$data";  
  
   if ($tcolor)  
      if ($tsize) $tail .= "&chts=$tcolor,$tsize";  
   if ($labels)   $tail .= "&chl=$labels";  
   if ($legends)  $tail .= "&chdl=$legends";  
   if ($colors)   $tail .= "&chco=$colors";  
   if ($bgfill)   $tail .= "&chf=bg,s,$bgfill";  
  
   $url = "http://chart.apis.google.com/chart?$tail";  
   // Uncomment the line below to return a URL to   
   // the chart image instead of the image itself  
   // return $url;  
  
   $image = imagecreatefrompng($url);  
  
   $w = imagesx($image);  
   $h = imagesy($image);  
   $image2 = imagecreatetruecolor($w + $border * 2,  
      $h + $border * 2);  
   $clr = imagecolorallocate($image,  
      hexdec(substr($bcolor, 0, 2)),  
      hexdec(substr($bcolor, 2, 2)),  
      hexdec(substr($bcolor, 4, 2)));  
   imagefilledrectangle($image2, 0, 0, $w + $border * 2,  
      $h + $border * 2, $clr);  
   imagecopy($image2, $image, $border, $border, 0, 0, $w, $h);  
   imagedestroy($image);  
   return $image2;  
} 
echo 'sadf';


$title   = 'TRUNG TÂM ĐÀO TẠO MẠNG MÁY TÍNH NGHỆ';  
$tcolor  = 'FF0000';  
$tsize   = '20';  
$type    = 'line';  
$width   = '1000';  
$height  = '230';  
$bwidth  = NULL;  
$labels  = '1|2|3|4|5';  
$legends = '1|2|3|4|6';  
$colors  = 'BD0000,DE6B00,284B89,008951,9D9D9D,A5AB4B,8C70A4,FFD200';  
$bgfill  = 'EEEEFF';  
$border  = '2';  
$bcolor  = '444444';  
$data    = '200,18.7,7.1,47.3,6.0,3.1,2.1';  
$result  = PIPHP_CreateGoogleChart($title, $tcolor, $tsize,$type, $bwidth, $labels, $legends, $colors, $bgfill,$border, $bcolor, $width, $height, $data); 
imagepng($result); 
?>