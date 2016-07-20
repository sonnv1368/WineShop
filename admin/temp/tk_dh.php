<?php
	include("../include/dbconn.php");
?>
<script language="javascript">
	function chktentk()
	{
		if (ctentk.checked)
		{
			document.getElementById("tentk").disabled=false;
			document.getElementById("tentk").value="";	
		}
		else
		{
			document.getElementById("tentk").disabled=true;
			document.getElementById("tentk").value="";		
		}
	}
	function chktennd()
	{
		if (ctennd.checked)
		{
			document.getElementById("tennd").disabled=false;
			document.getElementById("tennd").value="";	
		}
		else
		{
			document.getElementById("tennd").disabled=true;
			document.getElementById("tennd").value="";		
		}
	}
	function chkmadon()
	{
		if (cmadon.checked)
		{
			document.getElementById("madon").disabled=false;
			document.getElementById("madon").value="";	
		}
		else
		{
			document.getElementById("madon").disabled=true;
			document.getElementById("madon").value="";		
		}
	}
	
	function chkmasp()
	{
		if (cmasp.checked)
		{
			document.getElementById("masp").disabled=false;
			document.getElementById("masp").value="";	
		}
		else
		{
			document.getElementById("masp").disabled=true;
			document.getElementById("masp").value="";		
		}
	}
	function chktensp()
	{
		if (ctensp.checked)
		{
			document.getElementById("tensp").disabled=false;
			document.getElementById("tensp").value="";	
		}
		else
		{
			document.getElementById("tensp").disabled=true;
			document.getElementById("tensp").value="";		
		}
	}
	
	function chkngay()
	{
		if (cngay.checked)
		{
			document.getElementById("ngay").disabled=false;
			document.getElementById("ngay").value="";	
		}
		else
		{
			document.getElementById("ngay").disabled=true;
			document.getElementById("ngay").value="";		
		}
	}
	
	function chktt()
	{
		if (ctt.checked)
		{
			document.getElementById("tt").disabled=false;
			document.getElementById("tt").value="";	
		}
		else
		{
			document.getElementById("tt").disabled=true;
			document.getElementById("tt").value="";		
		}
	}
	function chkhttt()
	{
		if (chttt.checked)
		{
			document.getElementById("httt").disabled=false;
			document.getElementById("httt").value="";	
		}
		else
		{
			document.getElementById("httt").disabled=true;
			document.getElementById("httt").value="";		
		}
	}

</script>

<fieldset>
	<legend>Tìm kiếm đơn đặt hàng</legend>
    <form action="" method="post" name="form1" id="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        	<tr>
            	<td align="center" colspan="8"><font color="#0000ff" size="4" face="Tahoma"><strong>CHỌN KIỂU TÌM KIẾM</strong></font></td>
            </tr>
            <tr>
            	<td height="20"></td>
               </tr>
            <tr>
            	<td> </td>
            	<td height="30" width="25"> <input name="cmadon" type="checkbox" id="cmadon" value="madon" onclick="chkmadon()">
                <td width="120"><font face="tahoma" size="2">Mã đơn đặt hàng</font></td>
                <td width="157" valign="middle">
              <div class="thefield"><input type="text" name="madon" id="madon" disabled="disabled"></div></td>
              <td align="center" valign="middle" >&nbsp;</td>
              <td width="5"><input name="cmasp" type="checkbox" id="cmasp" value="masp" onclick="chkmasp()"></td>
              <td><font face="tahoma" size="2">Mã sản phẩm</font></td>
                <td>
              <div class="thefield"><input type="text" name="masp" id="masp" disabled="disabled"></div></td>
                <td width="10"> </td>
            </tr>
            <tr>
            <td> </td>
            	<td height="30"><input name="ctentk" type="checkbox" id="ctentk" value="tentk" onclick="chktentk()"></td>
                <td height="30"><font face="tahoma" size="2">Tên tài khoản</font></td>
                <td align="left" valign="middle">
                 
                  <div class="thefield">  <input type="text" name="tentk" id="tentk" disabled="disabled"></div></td>
                <td align="left" valign="middle" >&nbsp;</td>
                <td width="10"><input name="ctensp" type="checkbox" id="ctensp" value="tensp" onclick="chktensp()"></td>
                <td valign="middle"><font face="tahoma" size="2">Tên sản phẩm</font></td>
                
              <td>
              <div class="thefield"><input type="text" name="tensp" id="tensp" disabled="disabled"></div></td>
              <td width="10"> </td>
            </tr>
            <tr>
            <td> </td>
            	<td height="30"><input name="ctennd" type="checkbox" id="ctennd" value="tennd"  onclick="chktennd()"></td>
                <td height="30"><font face="tahoma" size="2">Tên người dùng</font></td>
                <td align="left" valign="middle">
                  
                   <div class="thefield"> <input type="text" name="tennd" id="tennd" disabled="disabled"></div>
              </td>
                <td align="center" valign="middle" >&nbsp;</td>
                <td width="10"><input name="cngay" type="checkbox" id="cngay" value="ngay" onclick="chkngay()"></td>
                <td><font face="tahoma" size="2">Ngày đặt hàng</font></td>
                <td>
              <div class="thefield"><input type="text" name="ngay" id="ngay" disabled="disabled"></div></td>
                <td width="10"> </td>
            </tr>
            <tr>
            <td> </td>
            	<td height="30"><input name="ctt" type="checkbox" id="ctt" value="tt" onclick="chktt()"></td>
                <td height="30"><font face="tahoma" size="2">Tình trạng đơn hàng</font></td>
                <td align="left" valign="middle">
                <div class="thefield">
                  <select name="tt" id="tt" disabled="disabled">
                    <option value="1">Đã xử lý</option>
                    <option value="2">Chưa xử lý</option>
                  </select>
                  </div>
                  </td>
                <td align="center" valign="middle" >&nbsp;</td>
                <td width="10"><input name="chttt" type="checkbox" id="chttt" value="httt" onclick="chkhttt()"></td>
                <td valign="middle"><font size="2" face="tahoma">Hình thức thanh toán</font></td>
                
              <td>
              <div class="thefield">
                <select name="httt" id="httt" disabled="disabled">
                <?php
				$sql="select * from hinhthucthanhtoan";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay))
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$id=$ketqua[0];
						$ten=$ketqua[1];
			?>
            	<option value="<?php echo $id;?>"><?php echo $ten;?></option>
            <?php
						
					}
					
					
				}
			?>
              </select></div></td>
              <td width="10"> </td>
            </tr>
            
            <tr>
                <td colspan="9" height="50" align="center"><input class="newbt-cn" type="submit" name="tk" id="tk" value="Tìm kiếm" onClick="return check();"></td>
            </tr>
            <tr>
            	<td height="20"> </td>
                <td colspan="2" align="center" valign="middle"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">
				</font></td>
                <td> </td>
                
            </tr>
    	</table>
    </form>
    <?php
	if(isset($_GET["trang"])==null)
		{
			unset($_SESSION["tk-dh"]);
		}
					if (isset($_POST["tk"]))
					{
						$arr1=array();
						$arr2=array();
						$arr3=array();
						if(isset($_POST["cmadon"]))
							array_push($arr2,$_POST["madon"]);
						if(isset($_POST["ctt"]))
							array_push($arr1,"trangthai = ".$_POST["tt"]);
						if(isset($_POST["chttt"]))
							array_push($arr1,"mahttt = ".$_POST["httt"]);
						if(isset($_POST["cngay"]))
							array_push($arr1,"ngaydat like '".$_POST["ngay"]."'");
						if(isset($_POST["cmasp"]))
						{
							$sql="select maddh from chitietddh where masp= '".$_POST["masp"]."'";
							$chay=mysql_query($sql);
							if (mysql_num_rows($chay))
							{
								while ($ketqua=mysql_fetch_array($chay))
								{
									$id=$ketqua[0];
									array_push($arr2,$_POST["madon"]);
								}
							}
						}
						if(isset($_POST["ctensp"]))
							{
								$sql="SELECT maddh FROM `chitietddh` WHERE masp in (SELECT masp FROM `sanpham` WHERE tensp like '%".$_POST["tensp"]."%')";
								$chay=mysql_query($sql);
								if (mysql_num_rows($chay))
								{
									while ($ketqua=mysql_fetch_array($chay))
									{
										$id=$ketqua[0];
										array_push($arr2,$_POST["madon"]);
									}
								}
						}
						if(isset($_POST["ctennd"]))
							{
								$sql="select matk from taikhoan where hoten like '%".$_POST["tennd"]."%'";
								$chay=mysql_query($sql);
								if (mysql_num_rows($chay))
								{
									while ($ketqua=mysql_fetch_array($chay))
									{
										$id=$ketqua[0];
										array_push($arr1,"matk = '".$id."'");
									}
								}
							}
						if(isset($_POST["ctennd"]))
							{
								$sql="select matk from taikhoan where hoten like '%".$_POST["tennd"]."%'";
								$chay=mysql_query($sql);
								if (mysql_num_rows($chay))
								{
									while ($ketqua=mysql_fetch_array($chay))
									{
										$id=$ketqua[0];
										array_push($arr2,$_POST["madon"]);
									}
								}
							}
							if(count($arr2))
								$str2="maddh in (".implode(",",$arr2).")";
							if(count($arr1))
								$str1=implode(" and ",$arr1);
						if (isset($str2))
							$_SESSION["tk-dh"]="select * from dondathang where ".$str2;
						elseif (isset($str1))
							$_SESSION["tk-dh"]="select * from dondathang where ".$str1;
						elseif (isset($str1) and isset($str2))
							$_SESSION["tk-dh"]= "select * from dondathang where ".$str1." and ".$str2;
					}
				?>
                <?php
				if (isset($_SESSION["tk-dh"]))
				{
					?>
                <div style="height:10px"></div>
				<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;" >  
                <tr>
      	<td colspan="6" align="center" valign="middle"><font color="#FF0000" size="4" face="Tahoma"><strong>KẾT QUẢ TÌM KIẾM</strong></font></td>
      </tr>
      <tr>
      	<td colspan="6" align="center" valign="middle" height="10"></td>
      </tr>
      <?php
	
		
			if ( isset($_GET['trang'])==false )
			{
				$trang = 0 ;
			}
			else
			{
				$trang=$_GET['trang'];
			}
			$sql=$_SESSION["tk-dh"];
			$sql0=mysql_query($sql) or die ("loi".mysql_error());
			$t_sodong = mysql_num_rows($sql0);
			$sotrang = $t_sodong/15;
			$dong=$trang*15;
			if($t_sodong == 0)
			{
				?>
             <td colspan="7" width="40" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#FF0000" size="3" face="Tahoma"><strong>Không có đơn hàng nào</strong></font></td>
		<?php
			}
			else
			{
				$i=$trang*15;
			?>
      <tr>
      	
        <td width="40" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="70" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Mã hóa đơn</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Ngày đặt hàng</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Đã xử lý</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Xem thông tin</strong></font></td>
        
      </tr>
      <?php
		$sql1 = mysql_query($sql." LIMIT $dong,15") or die(mysql_error());
		
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$idkh=$ketqua[1];
				$ngay=$ketqua[4];
				$tinhtrang=$ketqua[3];
				$i=$i+1;
				
				$result=mysql_query("select tendangnhap from taikhoan where matk=$idkh");
				while ($kq=mysql_fetch_array($result))
				{
					$taikhoan=$kq[0];
				}
		?>
       <tr>
        <td width="40" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="70" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $id;?></font></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $taikhoan;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ngay;?></font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="tinhtrang" <?php if ($tinhtrang==1) echo "checked"; ?> disabled="disabled" /></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #33CC00"><a href="index.php?page=tt-dh&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
			echo "<a href='index.php?page=qldh&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php 
	   
			}
		}
	  ?>
     
    </table>
    <?php
					}
					?>
</fieldset>
<script>
var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("madon","num","Nhập kiểu số cho Mã đơn");
 
 frmvalidator.addValidation("masp","num","Nhập kiểu số cho Mã sản phẩm");


</script>
