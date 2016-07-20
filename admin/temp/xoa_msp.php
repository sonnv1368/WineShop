<?php
	session_start();
	ob_start();
	include("../include/dbconn.php");
?>
<?php
	$idmuc= $_GET["id"];
	
	$sql="select * from loaisp where madanhmuc=$idmuc";
	$chay=mysql_query($sql);
	while($kq=mysql_fetch_array($chay))
	{
		$idloai=$kq[0];
		$sql1="select * from sanpham where malsp=$idloai";
		$chay1=mysql_query($sql1);
		while($kq1=mysql_fetch_array($chay1))
		{
			$idsp=$kq1[0];
			$anh="../".$kq1[6];
			$sql2="delete from sanpham where id=$idsp";
			mysql_query($sql2);
			unlink($anh);
			$sql3 = "delete from danhgia where id = $idsp";
			mysql_query($sql3);
		}
		$sql4="delete from loaisp where malsp = $idloai";
		mysql_query($sql4);
	}
	
	
	
	$sql = "delete from danhmucsp where madanhmuc = $idmuc";
	if (mysql_query($sql))
	{
		header("Location:index.php?page=ht_msp&success=1");
	}
	else
	{
		header("Location:index.php?page=ht_msp&success=0");
		
	}

?>
