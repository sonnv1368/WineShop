<?php
	session_start();
	ob_start();
	include("../include/dbconn.php");
?>
<?php
	$id= $_GET["id"];
	$sql = "delete from nhacungcap where mancc = $id";
	if (mysql_query($sql))
	{	
		header("Location:index.php?page=qlncc&success=1");
	}
	else
	{
		header("Location:index.php?page=qlncc&success=0");
		
	}

?>