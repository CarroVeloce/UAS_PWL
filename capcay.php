<?php
session_start();

function generateCaptcha() {
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $pass = array();

    $panjangalpha = strlen($alphabet) - 1;
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $panjangalpha);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

$code = generateCaptcha();
$_SESSION["code"] = $code;

$wh = imagecreatetruecolor(173, 50);
$bgc = imagecolorallocate($wh, 22, 86, 165);
imagefill($wh, 0, 0, $bgc);

$fc = imagecolorallocate($wh, 223, 230, 233);
imagestring($wh, 10, 50, 15, $code, $fc);

header("Content-type: image/png");
imagepng($wh);
imagedestroy($wh);
?>
