<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<script src="js/jquery-1.5.min.js" type="text/javascript"> </script>
<script src="js/equalHeight.js" type="text/javascript"> </script>

<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js" type="text/javascript"> </script>
<script src="js/lightbox.js" type="text/javascript"> </script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<script src="js/prototype.js" type="text/javascript"> </script>
<script src="js/scriptaculous.js" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>-->

<!--<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen"/>-->

<title>Spuntik-головна</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/menu.css" type="text/css" rel="stylesheet">
<link href="css/photo.css" type="text/css" rel="stylesheet">

</head>
<body>
	<div id="main">
       <div id="head"> 
           <p class="forum"><a href="logged_in.php"></a></p>
       </div>
           
       <div id="nov">
       <?php include "menu.php";?>       
       </div>
            
       <div id="kontext">
       		
             <div id="login">
				<p></p><?php 
				if(isset($_SESSION['user']))
					include "userMenu.php"; 
				else
					include "login.php";
				?>
            </div>
            
            <div id="kontext1" >
      
			  <div id="contentP">
					<!--<div class="photoGallery">-->
                    	<p>
                        <!--<a href="images/Veluka.jpg" rel="lightbox[group]" title="">
                        	<img src="images/Veluka.jpg" height="165" width="115px" alt=""></a>
                            
                        <a href="images/DSC01735.JPG" rel="lightbox[group]" title="">
                        	<img src="images/DSC01735.JPG" height="115px" width="165px" alt=""></a>
                        </p>  -->  
                        <a href="images/Veluka.jpg" rel="lightbox[group]" title="Головний лікар">
							<img src="images/Veluka.jpg" height="165px" width="115px" alt=""></a>
						
						<a href="images/DSC01735.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01735.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01740.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01740.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01749.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01749.jpg" height="115px" width="165px" alt=""></a>
						</p>
                        <p>
						<a href="images/DSC01750.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01750.jpg" height="115px" width="165px" alt=""></a>
							
						<a href="images/DSC01755.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01755.jpg" height="115px" width="165px" alt=""></a>
							
						<a href="images/DSC01756.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01756.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01759.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01759.jpg" height="115px" width="165px" alt=""></a>
						</p>
                        <p>
						<a href="images/DSC01766.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01766.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01784.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01784.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01786.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01786.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01787.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01787.jpg" height="115px" width="165px" alt=""></a>
						</p>
                        <p>
						<a href="images/DSC01790.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01790.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01794.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01794.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01795.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01795.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01797.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01797.jpg" height="115px" width="165px" alt=""></a>
						</p>
                        <p>
						<a href="images/DSC01811.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01811.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01816.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01816.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01847.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01847.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01849.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01849.jpg" height="115px" width="165px" alt=""></a>
                        </p>
						<p>
						<a href="images/DSC01860.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01860.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01876.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01876.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01884.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01884.jpg" height="115px" width="165px" alt=""></a>
						
						<a href="images/DSC01893.jpg" rel="lightbox[group]" title="">
							<img src="images/DSC01893.jpg" height="115px" width="165px" alt=""></a>
						</p>
					<!--</div>-->
      			</div>
      
			</div>
       </div>
       
       <div class="clear">
           <div id="foot">
				"Санаторій-профілакторій "Супутник" © 2012&nbsp; | &nbsp;
           </div>
       </div>
     
	</div>
	
</body>
</html>

