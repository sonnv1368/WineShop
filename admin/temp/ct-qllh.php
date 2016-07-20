<?php
	include("../include/dbconn.php");
?>
	  <?php 
	  	if (isset($_GET["id"])==true)
		{
			$id=$_GET["id"];
			$i=0;
			$sql=mysql_query("select * from lienhe where malh=$id");
			while($ketqua=mysql_fetch_array($sql))
			{
				
				$hoten=$ketqua[1];
				$tinhtrang=$ketqua[7];
				$sdt=$ketqua[2];
				$dc=$ketqua[3];
				$email=$ketqua[4];
				$noidung=$ketqua[5];
				$ngay=$ketqua[6];
			}
			
			
		?>
<fieldset>
  <legend>Thông tin liên hệ</legend>

    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
    	<tr>
        	<td colspan="5" align="center"><font color="#FF0000" size="3" face="Tahoma"><strong>THÔNG TIN LIÊN HỆ</strong></font></td>
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
        	<td width="150" height="20"><font color="#222222" size="2" face="Tahoma"><strong>Tên khách hàng </strong></font></td>
            <td><?php echo $hoten;?></td>
            <td width="80"></td>
            <td width="150"><font color="#222222" size="2" face="Tahoma"><strong>Số điện thoại </strong></font></td>
            <td width="110"><?php echo $sdt;?></td>
        </tr>
        <tr>
        	<td height="20"><font color="#222222" size="2" face="Tahoma"><strong>Địa chỉ </strong></font></td>
            <td><?php echo $dc;?></td>
            <td></td>
            <td><font color="#222222" size="2" face="Tahoma"><strong>Email </strong></font></td>
            <td><?php echo $email;?></td>
            </td>
        </tr>
         <tr>
        	<td colspan="5" height="20"><strong>Nội dung: </strong><?php echo $noidung;?> </td>
            
        </tr>
         
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
        	<td align="right" width="240"><input class="newbt-cn" type="submit" name="xuly" id="xuly" value="Xử lý" /></td>
            <td align="center" width="20"></td>
            <?php } ?>
            <td align="<?php if($tinhtrang==2) echo "left"; else echo "center";?>" width="240"><input class="newbt-cn" type="submit" name="thoat" id="thoat" value="Thoát" /></td>
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
		header('location:index.php?page=qllh');
	}
	if (isset($_POST["xuly"]))
	{
		mysql_query("update lienhe set trangthai=1 where malh=$id") or die ("loi ".mysql_error());
		header('location:index.php?page=ct-qllh&id='.$id.'&sc=1');
	}
?>
<?php
	if (isset($_GET["sc"])==1)
		echo "<script>alert('Đã được xử lý');</script>";
?>