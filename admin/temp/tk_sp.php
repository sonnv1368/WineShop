<?php
	include("../include/dbconn.php");
?>
<script language="javascript">
	function chkten()
	{
		if (cten.checked)
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
	
	function chkloai()
	{
		if (cloai.checked)
		{
			document.getElementById("loaisp").disabled=false;
			document.getElementById("loaisp").value="";	
		}
		else
		{
			document.getElementById("loaisp").disabled=true;
			document.getElementById("loaisp").value="";		
		}
	}
	
	function chkmuc()
	{
		if (cmuc.checked)
		{
			document.getElementById("mucsp").disabled=false;
			document.getElementById("mucsp").value="";	
		}
		else
		{
			document.getElementById("mucsp").disabled=true;
			document.getElementById("mucsp").value="";		
		}
	}
	
	function chkncc()
	{
		if (cncc.checked)
		{
			document.getElementById("ncc").disabled=false;
			document.getElementById("ncc").value="";	
		}
		else
		{
			document.getElementById("ncc").disabled=true;
			document.getElementById("ncc").value="";		
		}
	}
	
	function chkgia()
	{
		if (cgia.checked)
		{
			document.getElementById("gia").disabled=false;
			document.getElementById("gia").value="";	
		}
		else
		{
			document.getElementById("gia").disabled=true;
			document.getElementById("gia").value="";		
		}
	}


</script>
<fieldset>
	<legend>Tìm kiếm sản phẩm</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        	<tr>
            	<td width="200" height="50"> </td>
                <td width="130" align="center" colspan="3"><font color="#0000ff" size="4" face="Tahoma"><strong>CHỌN KIỂU TÌM KIẾM</strong></font></td>
                <td width="200"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td width="50" align="center" valign="middle"><input name="cten" type="checkbox" id="cten" value="ten" onclick="chkten()" />
              <label for="cten"></label></td>
              <td align="center" valign="middle" ><font face="tahoma" size="2">Tên sản phẩm</font></td>
                <td valign="middle"><div class="thefield"> <input name="tensp" type="text" id="tensp" size="30" disabled="disabled"></div> </td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
              <td width="50" align="center" valign="middle"><input name="cloai" type="checkbox" id="cloai" value="loai" onclick="chkloai()" />
              <label for="cten"></label></td>
              <td align="center" valign="middle" ><font face="tahoma" size="2">Loại sản phẩm</font></td>
                <td valign="middle"><div class="thefield"><select name="loaisp" id="loaisp" disabled="disabled">
            <?php
				$sql="select * from loaisp";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay))
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$idloai=$ketqua[0];
						$tenloai=$ketqua[2];
			?>
            	<option value="<?php echo $idloai;?>" ><?php echo $tenloai;?></option>
            <?php
						
					}
					
					
				}
			?>
            </select></div> </td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="cmuc" type="checkbox" id="cmuc" value="muc" onclick="chkmuc()" />
              <label for="cncc"></label></td>
                <td align="center" valign="middle" ><font face="tahoma" size="2">Mục sản phẩm</font></td>
                <td valign="middle"><div class="thefield"><select name="mucsp" id="mucsp" disabled="disabled">
            <?php
				$sql="select * from danhmucsp";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay))
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$idmuc=$ketqua[0];
						$tenmuc=$ketqua[1];
			?>
            	<option value="<?php echo $idmuc;?>" ><?php echo $tenmuc;?></option>
            <?php
						
					}
					
					
				}
			?>
            </select></div></td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="cncc" type="checkbox" id="cncc" value="ncc" onclick="chkncc()" />
              <label for="cncc"></label></td>
              <td align="center" valign="middle" ><font face="tahoma" size="2">Nhà cung cấp</font></td>
                <td valign="middle"> <div class="thefield"><select name="ncc" id="ncc" disabled="disabled">
            <?php
				$sql="select * from nhacungcap";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay))
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$idncc=$ketqua[0];
						$tenncc=$ketqua[1];
			?>
            	<option value="<?php echo $idncc;?>" ><?php echo $tenncc;?></option>
            <?php
						
					}
					
					
				}
			?>
            </select></div></td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="cgia" type="checkbox" id="cgia" value="gia" onclick="chkgia()" />
              <label for="cncc"></label></td>
                <td align="center" valign="middle" ><font size="2" face="tahoma">Giá</font></td>
                <td valign="middle"><div class="thefield">
                  <label for="gia"></label>
                  <select name="gia" id="gia" disabled="disabled">
                    <option value="1">&lt; 1.000.000</option>
                    <option value="2">1.000.000 - 5.000.000</option>
                    <option value="3">5.000.000 - 15.000.000</option>
                    <option value="4">&gt; 15.000.000</option>
                  </select>
              </div></td>
                
              <td> </td>
            </tr>
             <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="ckhoa" type="checkbox" id="ckhoa" value="khoa" /></td>
                <td align="center" valign="middle" ><font face="tahoma" size="2">Khóa</font></td>
                <td valign="middle">&nbsp;</td>
                
              <td> </td>
            </tr>
            
            <tr>
            	<td height="50"> </td>
                <td colspan="3" align="center"><input class="newbt-cn" type="submit" name="tk" id="tk" value="Tìm kiếm" onClick="return check();">&nbsp;&nbsp;
&nbsp;                <input class="newbt-cn" type="reset" name="rs" id="rs" value="Reset" /></td>
                
                <td> </td>
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
			unset($_SESSION["tk-sp"]);
		}
					if (isset($_POST["tk"]))
					{
						$arr=array();
						if(isset($_POST["cten"]))
							array_push($arr,"tensp like '%".$_POST["tensp"]."%'");
						if(isset($_POST["cloai"]))
							array_push($arr,"malsp =".$_POST["loaisp"]);
						if(isset($_POST["cmuc"]))
							array_push($arr,"MaLSP in (select malsp from loaisp where madanhmuc=".$_POST["mucsp"].")");
						if(isset($_POST["cncc"]))
							array_push($arr,"mancc = '".$_POST["ncc"]."'");						if(isset($_POST["cgia"]))
						{
							$tg=$_POST["gia"];
							if ($tg==1)
							{
								array_push($arr,"dongia < 1000000");
							}
							if ($tg==2)
							{
								array_push($arr,"dongia between 1000000 and 5000000");
							}
							if ($tg==3)
							{
								array_push($arr,"dongia between 5000000 and 15000000");
							}
							if ($tg==4)
							{
								array_push($arr,"dongia >15000000");
							}
						}
						if(isset($_POST["ckhoa"]))
							array_push($arr,"trangthai=2");
						else
							array_push($arr,"trangthai=1");
						
						$str=implode(" and ",$arr);
						$_SESSION["tk-sp"]="select * from sanpham where $str";
					}
					
				?>
                  <?php
				if (isset($_SESSION["tk-sp"]))
				{
					?>
<div style="height:10px"></div>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;" >
    <tr>
      	<td colspan="7" align="center" valign="middle"><font color="#FF0000" size="4" face="Tahoma"><strong>KẾT QUẢ TÌM KIẾM</strong></font></td>
      </tr>
      <tr>
      	<td colspan="7" align="center" valign="middle" height="10"></td>
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
		$sql=$_SESSION["tk-sp"];
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có sản phẩm nào</strong></font></td>
	  <?php }
	  	else
		{
			?>
             <tr>
        <td width="50" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="300" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên sản phẩm</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Giá</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Ảnh</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Nổi bật</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Khóa</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
      </tr>
      <?php
			$i=$trang*15;
			$sql1=mysql_query($sql." limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$ten=$ketqua[3];
				$gia=$ketqua[5];
				$anh=$ketqua[6];
				$nb=$ketqua[8];
				$tt=$ketqua[10];
				$i=$i+1;
		?>
     
      
       <tr>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ten;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo number_format($gia,0,',','.');?> VNĐ</font></td>
        <td height="75" width="75" align="center" valign="middle" style="border:solid 1px #33CC00"><img src="../<?php echo $anh;?>" height="73" width="73"></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="noibat"<?php if ($nb==1) echo "checked"; ?> disabled="disabled" /></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="khoa"<?php if ($tt==2) echo "checked"; ?> disabled="disabled" /></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><a href="index.php?page=sua_sp&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=tk_sp&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
     <?php
					}
					?>
</fieldset>


<script>
	function check()
	{
		if(form1.name.value=="")
		{	alert("Bạn chưa điền tên loại sản phẩm");
			form1.name.focus();
			return false;
		}
		else
			return true;	
	}
</script>
