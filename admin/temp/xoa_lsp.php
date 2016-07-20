<?php
	session_start();
	ob_start();
	include("../include/dbconn.php");
?>
<?php
	$id= $_GET["id"];
	$sql="select * from sanpham where malsp=$id";
	$chay=mysql_query($sql);
	while($kq=mysql_fetch_array($chay))
	{
		$idsp=$kq[0];
		$anh="../".$kq[5];
		$sql = "select * from chitietddh where masp = $idsp";
		$chay1=mysql_query($sql1);
		if (mysql_num_rows($chay1)>0)
		{
			while($kq1=mysql_fetch_array($chay1))
			{
				$madh=$kq1[0];
				$sql2="delete from chitietddh where maddh=$madh and masp=$idsp";
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
		$sql1="delete from sanpham where masp=$idsp";
		mysql_query($sql1);
		unlink($anh);
	}
	$sql = "delete from loaisp where malsp = $id";
	if (mysql_query($sql))
	{
		header("Location:index.php?page=ht_lsp&success=1");
	}
	else
	{
		header("Location:index.php?page=ht_lsp&success=0");
		
	}

?>
