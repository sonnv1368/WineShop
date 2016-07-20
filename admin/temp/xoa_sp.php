<?php
	session_start();
	ob_start();
	include("../include/dbconn.php");
?>
<?php
	$id= $_GET["id"];
	
	$sql = "select * from chitietddh where masp = $id";
		$chay1=mysql_query($sql1);
		if (mysql_num_rows($chay1)>0)
		{
			while($kq1=mysql_fetch_array($chay1))
			{
				$madh=$kq1[0];
				$sql2="delete from chitietddh where maddh=$madh and masp=$id";
				mysql_query($sql2);
				$sq2 = "select * from chitietddh where maddh = $madh";
				$chay2=mysql_query($sql2);
				if (mysql_num_rows($chay2)==0)
				{
					$sql3="delete from dondathang where maddh=$madh";
					mysql_query($sql2);
				}
			}
		}
	
	$sql="select * from sanpham where masp=$id";
	$chay=mysql_query($sql);
	while ($kq=mysql_fetch_array($chay))
	{
		$anh="../".$kq[4];
	}
	$sql = "delete from sanpham where masp = $id";
	if (mysql_query($sql))
	{	
		unlink($anh);
		header("Location:index.php?page=qlsp&success=1");
	}
	else
	{
		header("Location:index.php?page=qlsp&success=0");
		
	}

?>