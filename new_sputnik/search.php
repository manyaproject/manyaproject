<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
       <?php include "menu.php";?>       
       </div>
            
       <div id="kontext">
       		
             <div id="login">
				<p></p><?php include "login.php"; ?>
            </div>
	
   
  </tr> 
<?php
include_once 'config.inc';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//echo "post travel = ". $_POST['travel'];
	//if($_POST['travel'] == 'выберите заезд')
//		$idTravel = '';
//	else
//	{
//		$idTravel = explode(' ', trim(strip_tags($_POST['travel'])));
//	}
	$searchLogin = trim(strip_tags($_POST['searchLogin']));
	$name = trim(strip_tags($_POST['name']));
	//echo "idTravel = ". $idTravel;
	//echo "serachLogin = ". $searchLogin;
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$sql = mysql_query("select name, city, address, contact, user from subscriber where user like '%$searchLogin%' and name like '%$name%'") or die(mysql_error());
	//$sql = mysql_query("select t1.id, t1.check_in, t1.check_out, t1.counter, t2.name, t2.city, t2.address, t2.contact, t2.user from travel as t1 left join subscriber as t2 on t1.id=t2.travel_id where t1.id like '%$idTravel[0]%' and t2.user like '%$searchLogin%' and t2.name like '%$name%'") or die(mysql_error());
	//var_dump($sql);
	//echo "<table>";
	while($res = mysql_fetch_assoc($sql))
	{
?>

<td  colspan="2"  background="img/1.jpg">
<p class="style_coment ">
   ФИО
    <?=$res['name']?>
<br>
    Город
    <?=$res['city']?>
<br>
    Адрес
    <?=$res['address']?>
<br>
	Контакт
    <?=$res['contact']?>
<br>
    Логин
    <?=$res['user']?>
<hr width="70%" color="#fbe7b5"  align="left">
</td> 


<?php
	}
	//echo "</table>";
	mysql_close();
}
?>
      <div id="kontext1" >
      

<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
<p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p>
<table>

<tr>
<td>Пошук по логіну</td>
<td><input type="text" name="searchLogin"></td>
</tr>
<tr>
<td>Пошук по фамілії</td>
<td><input type="text" name="name"></td>
</tr>
</table>
<input type="submit" value="отправить">

</form>

<a href="logged_in.php">вернутся на главную</a>

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