<?php
session_start();
// ���������� �����
$number = rand(111111,999999);
$_SESSION['numberCopy1'] = $number;
/*$numberCopy = $number;
$captcha = 0;
for($i = 0; $i < 6; $i++)
{	$captcha = $captcha + ($numberCopy % 10);
	$numberCopy = intval($numberCopy / 10);}*/
//$_SESSION['captcha'] = $captcha;
//echo "captcha = ". $captcha;
// ������������� Cookies
//setcookie('A_num', $number);

// ������� ������� � �������� 50x25
$img = imagecreate('50', '25');

// ���� ���� - �����
$back = imagecolorallocate($img, 255, 255, 255);

// ���� ������
$black = imagecolorallocate($img, 0, 0, 0);

// ������ �����
// $img - ������������� ��������
// 3 - ����� ������
// 5 - ���������� X
// 4 - ���������� Y
// $number - ���� �����
// $black - ���� ������

imagestring($img, 3, 5, 4, $_SESSION['numberCopy'], $black);
// ������� ������� � �������

imagepng($img);
?>