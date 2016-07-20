<?PHP
	session_start();
	ob_start();
	include("../../include/dbconn.php");
	$sql=$_SESSION["thongke"];
	$chk=$_GET["chk"];
	$arr=explode("'",$sql);
	$sql1="SELECT sum(soluong*dongia) FROM chitietddh WHERE maddh in (".$sql.")";
	$chay1=mysql_query($sql1);
	while($kq1=mysql_fetch_array($chay1))
	{
		$doanhthu=$kq1[0];	
		
		
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3" align="center"><font color="#FF0000" size="5" face="Tahoma"><strong>THỐNG KÊ DOANH THU</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td colspan="3" align="center"><font size="4" face="Tahoma"><strong>
      <?php 
	  	if($chk==1)
		{
			echo "NGÀY ".$arr[1];
		}
		if($chk==2)
		{
			echo "THÁNG ".$arr[1]." NĂM ".$arr[3];
		}
		if($chk==3)
		{
			echo "NĂM ".$arr[1];
		}
		if($chk==4)
		{
			echo "TỪ NGÀY  ".$arr[1]." ĐẾN NGÀY ".$arr[3];
		}
			?>
      <div>Doanh thu: <?php if ($doanhthu>0) echo $doanhthu." VNĐ"; else echo "0 VNĐ";
	  	
	  
	  
	  ?>
      </div>
      
      </strong></font></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>