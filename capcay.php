<?php
session_start();

function generateCaptcha() {
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $pass = array();

    $length = 5; 
    $panjangalpha = strlen($alphabet) - 1;
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $panjangalpha);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

$code = generateCaptcha();
$_SESSION["code"] = $code;

$width = 173;
$height = 50;
$font = 6;
$fontWidth = imagefontwidth($font) * strlen($code);
$fontHeight = imagefontheight($font);

$image = imagecreatetruecolor($width, $height);
$bgColor = imagecolorallocate($image, 22, 86, 165);
$textColor = imagecolorallocate($image, 223, 230, 233);

imagefill($image, 0, 0, $bgColor);

$x = ($width - $fontWidth) / 2;
$y = ($height - $fontHeight) / 2;
imagestring($image, $font, $x, $y, $code, $textColor);

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>
