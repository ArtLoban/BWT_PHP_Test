<?php
session_start();
$number_1 = rand(1, 9); 
$number_2 = rand(1, 9); 

$_SESSION['rand_code'] = $number_1 + $number_2;
//$dir = ROOT."/template/fonts/";

$image = imagecreatetruecolor(130, 60); // Создаю изображение
$color = imagecolorallocate($image, 200, 100, 90); // Задаю 1-й цвет
$white = imagecolorallocate($image, 255, 255, 255); // Задаю 2-й цвет
imagefilledrectangle($image, 0, 0, 399, 99, $white); // Делаю капчу с белым фоном

imagettftext ($image, 20, 3, 10, 40, $color, "verdana.ttf", "$number_1 + $number_2 = "); // Пишем текст

header("Content-type: image/png"); // Отсылаю заголовок о том, что это изображение png
imagepng($image); // Вывод изображения
imagedestroy($image);
