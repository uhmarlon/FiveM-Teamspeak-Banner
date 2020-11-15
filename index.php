<?php
include_once 'assets/cron/timer.php';
include_once 'assets/cron/players.php';

$ip = 'localhost'; // IP Server
$port = '30120'; // TCP Port Server
$sel = FivemQueryPlayers($ip, $port);

header ("Content-type: image/png");
$banner = imagecreatefrompng("assets/images/Banner.png");//background image
$color = ImageColorAllocate ($banner, 255,255,255);//color of the text
$players = number_format($sel)." / 32"; //Displays the number of players
$font = 'assets/font/sourcesans.ttf';//font that is taken

imagettftext($banner, 32, 0, 465, 234, $color, $font, $players);
imagettftext($banner, 32, 0, 744, 234, $color, $font, $restarttime);

ImagePNG ($banner);
?>
