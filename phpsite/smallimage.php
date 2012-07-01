<?
// Скрипт генерации маленького изображения
// Требуется установленная библиотека GD2
// (C) 2005-2008, www.homepictures.ru

define('SAPI_NAME', php_sapi_name());

error_reporting(E_ERROR);

if(isset($_GET['request'])){
	if(preg_match("~/([^/]+)$~", $_GET['request'], $m)){
		$_GET['file'] = 'p/'.$m[1];
	}
	if(preg_match("~/(h|w\d+.*)/[^/]+$~i", $_GET['request'], $m)){
		$_GET['size'] = $m[1];
	}
}

if(isset($_GET['file']))
	$filename = GetValue($_GET['file']);
elseif(isset($_GET['src']))
	$filename = GetValue($_GET['src']);
else
	SendStatus404();

if(is_file($filename)){
	$w = $h = $mode = 0;

	if(isset($_GET['w'])) $w = intval($_GET['w']);
	if(isset($_GET['h'])) $h = intval($_GET['h']);
	if(isset($_GET['mode'])) $h = intval($_GET['mode']);

	if(isset($_GET['size'])){
		if(preg_match("/w(\d+)/i", $_GET['size'], $m)) $w=$m[1];
		if(preg_match("/h(\d+)/i", $_GET['size'], $m)) $h=$m[1];
		if(preg_match("/mode(\d+)/i", $_GET['size'], $m)) $mode=$m[1];
	}
	$is=getimagesize($filename);
	GenerateSmallImage($filename, $is, $w, $h, $mode, '');
}
else{
	SendStatus404();
}

exit();

function GenerateSmallImage($src, $is, $w, $h, $mode, $dest){
	$cx = $is[0]; $cy = $is[1];
	$x = $y = $xd = $yd = 0;
	if($w==0 && $h==0){ 
		$w=150; $h=100; //default value
	}
	if($w>0 && $h>0){
		$scx = $w;	$scy = $h;
		if($mode==0){
			$scale = $cy/$cx;
			$test_y = round($scx*$scale);
			if($test_y<$scy){
				$y = round(($scy-$test_y)/2);
				$scy = $test_y;
			}
			else{
				$scale = $cx/$cy;
				$test_x = round($scy*$scale);
				$x = round(($scx-$test_x)/2);
				$scx = $test_x;
			}
		}
		else{
			$scale = $scy/$scx;
			$test_y = round($cx*$scale);
			if($test_y<=$cy){
				$yd = round(($cy-$test_y)/2);
				$cy -= $yd*2;
			}
			else{
				$scale = $scx/$scy;
				$test_x = round($cy*$scale);
				$xd = round(($cx-$test_x)/2);
				$cx -= $xd*2;
			}
		}
	}
	elseif($w>0){
		$scx = $w;	$scy = (int)round($w*$cy/($cx*1.00));
	}
	else{ //if($h>0)
		$scy = $h; $scx = (int)round($h*$cx/($cy*1.00));	
	}
		
	switch($is[2]){
	case 1 :
		if((imagetypes() & IMG_GIF)!=0){
			$im = imagecreatefromgif($filename);/*'gif'*/
		}
		else{ return; }
		break;
	case 2 :
		$im = imagecreatefromjpeg($src);/*'jpg'*/
		break;
	case 3 :
		$im = imagecreatefrompng($src);/*'png'*/
		break;
	}
	if(function_exists('imagecreatetruecolor'))
		$sim=imagecreatetruecolor($w, $h);
	else
		$sim=imagecreate($w, $h);


	$fill_color = imagecolorallocate ($sim, 255, 255, 255);
	imagefilledrectangle($sim, 0, 0, $w, $h, $fill_color);
	if(function_exists('imagecopyresampled'))
		imagecopyresampled($sim, $im, $x, $y, $xd, $yd, $scx, $scy, $cx, $cy);
	else
		imagecopyresized($sim, $im, $x, $y, $xd, $yd, $scx, $scy, $cx, $cy);
	imagejpeg($sim, $dest, 100);
	imagedestroy($im);
	imagedestroy($sim);
}

function SendStatus200(){
	if(!defined('CURRENT_HTTP_STATUS')){
		if (SAPI_NAME == 'cgi' OR SAPI_NAME == 'cgi-fcgi') header('Status: 200 OK');
		else header('HTTP/1.1 200 OK');
		define('CURRENT_HTTP_STATUS', 200);
	}
}
function SendStatus404($ERROR_TEXT_404='', $bExit=true){
	if(!defined('CURRENT_HTTP_STATUS')){
		if (SAPI_NAME == 'cgi' OR SAPI_NAME == 'cgi-fcgi') header("Status: 404 Not Found");
		else header("HTTP/1.1 404 Not Found");
		define('CURRENT_HTTP_STATUS', 404);
	}
	if($ERROR_TEXT_404!='') print $ERROR_TEXT_404;
	if($bExit) exit();
}

function GetValue($name){
	return trim(get_magic_quotes_gpc() ? stripslashes($name) : $name);
}


?>