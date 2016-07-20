<?php
	session_start();
	ob_start();
	include("include/dbconn.php");
?>
<?php
	$name=$_POST["user"];
	$pass=$_POST["pass"];
	$sql=mysql_query("select * from taikhoan where tendangnhap='$name' and matkhau='$pass'");
	if (mysql_num_rows($sql)==1)
	{
		$sql1=mysql_query("select * from taikhoan where tendangnhap='$name' and matkhau='$pass' and trangthai=1");
		if (mysql_num_rows($sql1)==1)
		{
			$_SESSION["login"]=1;
			$r=mysql_fetch_row($sql);
			$_SESSION["userid"]=$r[0];
			$_SESSION["user"]=$name;
			header('Location:index.php');
		}
		else
		{
			$_SESSION["login"]=3;
			header('Location:index.php');
		}	
	}
	else
	{
		$_SESSION["login"]=2;
		header('Location:index.php');
	}
?>
	