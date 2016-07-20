<?php
	session_start();
?>
<?php
	$name=$_POST["name"];
	$pass=$_POST["pass"];
	include("../include/dbconn.php");
	$sql="select * from taikhoan where tendangnhap='$name' and matkhau='$pass' and macapdo=1 and trangthai=1";
	if (mysql_num_rows(mysql_query($sql))==1)
	{
		$_SESSION["loginad"]=0;
		$_SESSION["userad"]=$name;
		header('Location:index.php');
	}
	else
	{
		$_SESSION["loginad"]=2;
		header('Location:login.php?sc=0');
	}
?>
	