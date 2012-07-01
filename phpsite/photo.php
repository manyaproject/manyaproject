<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Главная</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen"/>
<script src="js/prototype.js" type="text/javascript"> </script>
<script src="js/scriptaculous.js" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>
<style type="text/css"> </style>


</head>

<body>
<table width="1052" border="0" align="center" bgcolor="#FFFFFF"  cellpadding="0" cellspacing="0">
 <tr >
    <td colspan=2 background="img/head.gif" width="1052" height="224" class="style3">
    <a href="logged_in.php"><b> <i> запитайте<br> он-лайн </i></b></a>
    </td>
</tr>

<!--  
    <td width="938" height="348" border="0" cellpadding="0" cellspacing="0">
      <tr>-->
  <tr>
  <? include ("blocks/lefttd.php");  ?>     
  </tr> 
      <tr> 
       <td width="810" valign="top" class="style1"  background="img/kontext.jpg"><p>Фото</p> 
       <p>
   <!--    <a href="images/image-1.jpg" rel="lightbox"><img src="images/thumb-1.jpg" width="100" height="40" alt="" /></a>
      <a href="images/girl.jpg" rel="lightbox"><img src="images/girl.jpg" width="60" height="100" alt="" /></a>-->
      
      <div id="contentP">
			<div >
				<a href="images/Veluka.jpg" rel="lightbox[group]" title="Головний лікар">
					<img src="images/Veluka.jpg" height="165px" width="115px" alt=""></a>
                
                <a href="images/DSC01735.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01735.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01740.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01740.jpg" height="115px" width="165px" alt=""></a>
				
                <a href="images/DSC01749.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01749.jpg" height="115px" width="165px" alt=""></a>
                <p>
                <a href="images/DSC01750.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01750.jpg" height="115px" width="165px" alt=""></a>
                    
                <a href="images/DSC01755.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01755.jpg" height="115px" width="165px" alt=""></a>
                    
                <a href="images/DSC01756.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01756.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01759.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01759.jpg" height="115px" width="165px" alt=""></a>
                <p>
                <a href="images/DSC01766.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01766.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01784.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01784.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01786.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01786.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01787.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01787.jpg" height="115px" width="165px" alt=""></a>
                <p>
                <a href="images/DSC01790.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01790.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01794.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01794.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01795.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01795.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01797.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01797.jpg" height="115px" width="165px" alt=""></a>
                <p>
                <a href="images/DSC01811.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01811.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01816.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01816.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01847.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01847.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01849.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01849.jpg" height="115px" width="165px" alt=""></a>
                <p>
                <a href="images/DSC01860.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01860.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01876.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01876.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01884.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01884.jpg" height="115px" width="165px" alt=""></a>
                
                <a href="images/DSC01893.jpg" rel="lightbox[group]" title="">
					<img src="images/DSC01893.jpg" height="115px" width="165px" alt=""></a>
			</div>
        </div>
      
      
       </td>
        <td width="246" valign="top" bgcolor="#000066" background="img/right.jpg"> 
         <br><img  src="img/avtorizaciya.jpg">
		 <? include ("login.php");  ?>
         </td>
      </tr>

  <tr>
    <td height="52" colspan=2 background= "img/footer.jpg" class="style2" align="center">“Санаторій-профілакторій "Супутник” © 2012&nbsp; | &nbsp;Федорова Марія</td>
  </tr>
</table>
</body>
</html>


