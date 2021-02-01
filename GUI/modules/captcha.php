<?php
session_start();
header("Content-type: image/png");
$captcha = imagecreate(70, 30);
$text = md5(microtime());
$text = substr($text,0,6);
$_SESSION["captcha"] = $text;
imagecolorallocate($captcha, 15, 142, 210);
$black = imagecolorallocate($captcha, 0, 0, 0);
$white = imagecolorallocate($captcha, 255, 255, 255);
imagestring($captcha, 5, 8, 8, $text, $white);
for($i = 0; $i < 3; $i++)
{
    imageline($captcha, rand(0,8), rand(0,30),rand(65, 70) , rand(0, 30), $black);
}
imagepng($captcha);
imagedestroy($captcha);
?>