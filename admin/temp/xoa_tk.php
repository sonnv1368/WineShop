<?php
	ob_start();
	include("../include/dbconn.php");
?>
<?php
	$id= $_GET["id"];
	$sql = "delete from taikhoan where matk = $id";
	if (mysql_query($sql))
	{
		header("Location:index.php?page=qltk&success=1");
	}
	else
	{
		header("Location:index.php?page=qltk&success=0");
		
	}

?>