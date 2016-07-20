<?php
	include("../include/dbconn.php");
?>
	  <?php 
	  	if (isset($_GET["id"])==true)
		{
			$id=$_GET["id"];
			$i=0;
			$sql=mysql_query("select * from dondathang where maddh=$id");
			while($ketqua=mysql_fetch_array($sql))
			{
				$idkh=$ketqua[1];
				$sql=mysql_query("select hoten from taikhoan where matk=$idkh");
				while($r=mysql_fetch_array($sql))
				{
					$tenkh=$r[0];
				}
				$tinhtrang=$ketqua[3];
				$ngay=$ketqua[4];
				$mahttt=$ketqua[2];
			}
			$sql1=mysql_query("SELECT sum( soluong * dongia ) FROM chitietddh where maddh=$id");
			while($ketqua1=mysql_fetch_array($sql1))
			{
				$thanhtien=$ketqua1[0];
			}
			
		?>
<fieldset>
  <legend>Thông tin đơn đặt hàng</legend>

    <table width="500" border="0" cellpadding="0" cellspacing="0" align="center">
    	<tr>
        	<td colspan="5" align="center"><font color="#FF0000" size="3" face="Tahoma"><strong>THÔNG TIN ĐƠN ĐẶT HÀNG</strong></font></td>
        </tr>
        <tr>
        	<td colspan="5" height="10"></td>
        </tr>
        <tr>
        	<td colspan="5" height="10" align="center"><font color="#6699FF" size="3" face="Tahoma"><strong><?php if ($tinhtrang==2) echo "Chưa xử lý"; else echo "Đã xử lý";?></strong></font></td>
        </tr>
        <tr>
        	<td colspan="5" height="10"></td>
        </tr>
    	<tr>
        	<td width="110"><font color="#222222" size="2" face="Tahoma"><strong>Mã hóa đơn </strong></font></td>
            <td width="80"><?php echo $id;?></td>
            <td width="80"></td>
            <td width="80"><font color="#222222" size="2" face="Tahoma"><strong>Ngày đặt </strong></font></td>
            <td width="110"><?php echo $ngay;?></td>
        </tr>
        <tr>
        	<td><font color="#222222" size="2" face="Tahoma"><strong>Tên khách hàng </strong></font></td>
            <td><?php echo $tenkh;?></td>
            <td></td>
            <td><font color="#222222" size="2" face="Tahoma"><strong>Thanh toán </strong></font></td>
            <td>
			<?php 
				$sql2="select * from hinhthucthanhtoan where mahttt=$mahttt";
				$chay2=mysql_query($sql2);
				while($ketqua2=mysql_fetch_array($chay2))
			{
				echo $ketqua2[1];
			}
			?> </td>
            </td>
        </tr>
         <tr>
        	<td></td>
            <td></td>
            <td></td>
            <td><font color="#222222" size="2" face="Tahoma"><strong>Tổng cộng </strong></font></td>
            <td><?php echo  number_format($thanhtien,0,',','.');?> VNĐ</td>
        </tr>
        <tr>
        	<td colspan="5" height="20"></td>
        </tr>
        <tr>
        	<td colspan="5" align="center"><font color="#FF0000" size="3" face="Tahoma"><strong>CHI TIẾT ĐƠN HÀNG</strong></font></td>
        </tr>
        <tr>
        	<td colspan="5" height="5"></td>
        </tr>
    </table>
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;" >  
      <tr>
      	
        <td width="30" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="140" align="center" valign="middle"bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên sản phẩm</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Đơn giá</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Số lượng</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Thành tiền</strong></font></td>
        
      </tr>
      
	  <?php 
	  		$chay=mysql_query("select * from chitietddh where maddh=$id");
			while ($ketqua=mysql_fetch_array($chay))
			{
				$idsp=$ketqua[1];
				$dongia=$ketqua[3];
				$soluong=$ketqua[2];
				$thanhtien=$soluong*$dongia;
				$i=$i+1;
				
				$result=mysql_query("select tensp from sanpham where masp=$idsp");
				while ($kq3=mysql_fetch_array($result))
				{
					$tensp=$kq3[0];
				}
		?>
       <tr>
        <td width="30" height="20" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="140" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $tensp;?></font></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo  number_format($dongia,0,',','.');?> VNĐ</font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $soluong;?></font></td>
		<td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo  number_format($thanhtien,0,',','.');?> VNĐ</font></td>
       </tr>
       <?php }
	   
		  ?>
     
    </table>
<form id="form1" name="form1" method="post" action="">

    <table width="500" cellpadding="0" cellspacing="0" border="0" align="center">
    	<tr>
        	<td height="20"></td>
        </tr>
    	<tr>
        	<?php
				if ($tinhtrang==2)
				{
			?>
        	<td colspan="3" align="right" width="240"><input class="newbt-cn" type="submit" name="xuly" id="xuly" value="Xử lý đơn hàng" /></td>
            <?php } ?>
            <td align="<?php if($tinhtrang==1) echo "left"; else echo "center";?>" width="240"><input class="newbt-cn" type="submit" name="thoat" id="thoat" value="Thoát" /></td>
        </tr>
        <tr>
        	<td height="20"></td>
        </tr>
    </table>
                      </form>
    
     
</fieldset>
<?php
		}
?>

<?php
	if (isset($_POST["thoat"]))
	{
		header('location:index.php?page=qldh');
	}
	if (isset($_POST["xuly"]))
	{
		$sql="select masp,soluong from chitietddh where maddh = $id";
		$chay=mysql_query($sql);
		while($ketqua=mysql_fetch_array($chay))
		{
			$idsp=$ketqua[0];
			$sl=$ketqua[1];
			$sql2="update sanpham set soluong=soluong-$sl where masp=$idsp";
			mysql_query($sql2);
			
		}
		mysql_query("update dondathang set trangthai=1 where maddh=$id") or die ("loi ".mysql_error());
		header('location:index.php?page=tt-dh&id='.$id.'&sc=1');
	}
?>
<?php
	if (isset($_GET["sc"])==1)
		echo "<script>alert('Đơn đặt hàng đã được xử lý');</script>";
?>