<?
	$taikhoan=$_POST["tk"];
	$matkhau=$_POST["mk"];
	$hoten=$_POST["ht"];
	include("include/dbconn.php");
	$sql="select * from user where taikhoan='$taikhoan'";
	$chay=mysql_query($sql);
	if (mysql_num_rows($chay)>0)
	{
		echo "<script>alert('Tài khoản đã tồn tại');</script>";
	}
	else
	{
		$sql="insert into user(taikhoan,matkhau,hoten,capdo,khoa) value('$taikhoan','$matkhau','$hoten',2,0)";
		if (mysql_query($sql))
		{
			echo "<script>alert('Đăng ký thành công');</script>";
		}
		else
		{
			echo mysql_error();
		}
	}
?>
	