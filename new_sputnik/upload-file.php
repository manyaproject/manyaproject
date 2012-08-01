<?php
$uploaddir = './uploads/';
$file = $uploaddir . basename($_FILES['uploadfile']['name']);
$size = getimagesize($_FILES['uploadfile']['tmp_name']);
if($size[0] >= 351)
	echo "errorSize";
else if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
  echo "success";
} else {
	echo "error";
}
?>