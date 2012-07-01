<?php
session_start();
// Генерируем номер
$number = rand(111111,999999);
$_SESSION['numberCopy1'] = $number;
/*$numberCopy = $number;
$captcha = 0;
for($i = 0; $i < 6; $i++)
{	$captcha = $captcha + ($numberCopy % 10);
	$numberCopy = intval($numberCopy / 10);}*/
//$_SESSION['captcha'] = $captcha;
//echo "captcha = ". $captcha;
// Устанавливаем Cookies
//setcookie('A_num', $number);

// Создаем рисунок с размером 50x25
$img = imagecreate('50', '25');

// Цвет фона - белый
$back = imagecolorallocate($img, 255, 255, 255);

// Цвет шрифта
$black = imagecolorallocate($img, 0, 0, 0);

// Рисуем цифры
// $img - идентификатор картинки
// 3 - номер шрифта
// 5 - координата X
// 4 - координата Y
// $number - наше число
// $black - цвет шрифта

imagestring($img, 3, 5, 4, $_SESSION['numberCopy'], $black);
// Выводим рисунок в браузер

imagepng($img);
?>