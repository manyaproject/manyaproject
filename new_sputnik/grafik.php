<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include_once 'config.inc';
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Spuntik-головна</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/menu.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.5.min.js" type="text/javascript"> </script>
<script src="js/equalHeight.js" type="text/javascript"> </script>
</head>
<body>
	<div id="main">
       <div id="head"> 
           <p class="forum"><a href="logged_in.php"></a></p>
       </div>
           
       <div id="nov">
       <?php include "menu.php" ?>
       </div>
            
       <div id="kontext">
       		
             <div id="login">
				<p></p><?php include "login.php"; ?>
            </div>
            
            <div id="kontext1" >
            <p>графік заїздів</p> 
       
        <?php
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES cp1251");
		$sql = mysql_query("select * from travel") or die(mysql_error());
		while($travels = mysql_fetch_assoc($sql))
		{
		?>
		<p class="grafik"> 
		<?php 
		echo 'заїзд №: '.$travels['id'] ;
		echo "  ". date('m.d.Y', $travels['check_in']);
		echo " - ". date('m.d.Y', $travels['check_out']);?></p>
		<?php
		}
		?>

       
       <p class="detal">  <a href="doc.php"> <<Повернутися назад</a>
       </div>
       </div>
       
       <div class="clear">
           <div id="foot">
           "Санаторій-профілакторій "Супутник" © 2012&nbsp; | &nbsp;
           </div>
       </div>
     </div>
  	<!---->

	
</body>
</html>