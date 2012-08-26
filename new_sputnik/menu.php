<!--<td valign="top" background= "img/novigation.jpg" height="78" colspan="2">-->
	<div id="coolmenu" align="center">
		   <ul class="dropdown">
             
           		<li><a href="index.php"><i>Головна</i></a></li>
                <li><a href="lik.php"><i>Лікування</i></a></li>
                <li > <a href="doc.php"><em><strong>Необхідна<br>інформація</strong></em></a></li>
                <?php
				if(!isset($_SESSION["user"]))
					echo "<li ><a href='register.php'><em><strong>Онлайн <br> реєстрація</strong></em></a></li>";
				?>
                <li ><a href="logged_in.php"><em><strong>Відгуки й<br>запитання</strong></em></a></li>
                <li ><a href="news.php"><em><strong>Новини</strong></em></a></li>
                <li ><a href="photo.php"><em><strong>Фотогалерея</strong></em></a></li>
                
              </ul>
        </div> 
           
 </td>

