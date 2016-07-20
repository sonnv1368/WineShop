<?php
	session_start();
	unset($_SESSION["loginad"]);	
	unset($_SESSION["userad"]);
	echo "<br><br><br><center><img src='../img/load.gif'><br> <br> <font size='2' face='tahoma'>Please Wait . . . </font></center>";

?>
<meta http-equiv="refresh" content="2; url=login.php" />