<?php
	ob_start();
	include("../include/dbconn.php");
?>

<fieldset>
	<legend>Thêm sản phẩm</legend>
    <form method="post" name="form1" action="" enctype="multipart/form-data" id="form1">
   	  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
    	<td align="center" colspan="8"><font color="#0000ff" size="4" face="Tahoma"><strong>THÊM SẢN PHẨM</strong></font></td>
    </tr>
    	  <tr>
    	    <td width="10" height="30">&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td width="10">&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td rowspan="3"></td>
  	    </tr>
    	  <tr>
    	    <td height="40">&nbsp;</td>
    	    <td width="170" align="right" valign="middle">Tên sản phẩm</td>
    	    <td>&nbsp;</td>
    	    <td align="left" valign="middle" width="150"><div class="thefield"><input name="tensp" type="text" id="tensp" size="30" /></div></td>
    	    <td align="left" valign="middle"></td>
    	    <td rowspan="2"></td>
  	    </tr>
    	  <tr>
    	    <td height="40">&nbsp;</td>
    	    <td align="right" valign="middle">Giá</td>
    	    <td>&nbsp;</td>
    	    <td valign="middle" align="left"><div class="thefield"><input name="gia" type="text" id="gia" size="30" ></div></td>
    	    <td align="left" valign="middle">&nbsp;VNĐ</td>
    	    <td>&nbsp;</td>
  	    </tr>
    	  <tr>
    	    <td height="40">&nbsp;</td>
    	    <td align="right" valign="middle">Upload ảnh</td>
    	    <td>&nbsp;</td>
    	    <td align="left" valign="middle" colspan="3"><div class="thefield"><input type="file" name="up"></div></td>
  	    </tr>
    	  <tr>
    	    <td height="40">&nbsp;</td>
    	    <td align="right" valign="middle">Nội dung</td>
    	    <td>&nbsp;</td>
    	    <td colspan="3" align="left" valign="middle">         
           <div class="thefield"> <textarea name="nd" id="nd" cols="45" rows="10" style="width: 553px; height: 254px;"></textarea></div></td>
    	    
  	    </tr>
    	  <tr>
    	    <td height="40">&nbsp;</td>
    	    <td align="right" valign="middle">Sản phẩm nổi bật</td>
    	    <td></td>
    	    <td align="left" valign="middle">
            <div class="thefield">
            <select name="nb" id="nb">
    	        <option value="0">Không</option>
    	        <option value="1">Có</option>
            </select></div></td>
    	    <td align="right" valign="right">Số lượng</td>
    	    <td valign="middle" align="left"> <div class="thefield"><input name="soluong" type="text" id="soluong" size="30"  style="width:47px; margin-left:10px;" ></div></td>
  	    </tr>
    	 <tr>
    	    <td height="40">&nbsp;</td>
    	    <td  align="right" valign="middle">Loại sản phẩm</td>
    	    <td></td>
    	    <td valign="middle" align="left">
            <div class="thefield">
            <select name="loaisp" id="loaisp">
            <?php
				$sql="select * from loaisp where trangthai=1";
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
            </select>
            </div>
            </td>
    	    <td align="right">Khóa</td>
    	    <td>  <input type="checkbox" name="khoa" style=" margin-left:10px;" /></td>
        <tr>
    	    <td height="40">&nbsp;</td>
    	    <td  align="right" valign="middle">Nhà cung cấp</td>
    	    <td></td>
    	    <td valign="middle" align="left">
            <div class="thefield">
  			<select name="ncc" id="ncc">
            <?php
				$sql="select * from nhacungcap where trangthai=1";
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
            </select></div>
            </td>
    	    <td></td>
    	    <td></td>
  	    </tr>
    	  <tr>
    	    <td height="40">&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td colspan="2" align="right"><input class="newbt-cn" type="submit" name="them" id="them" value="Thêm" onclick="return check()">
   	        &nbsp;&nbsp;<input class="newbt-cn" type="submit" name="thoat" id="thoat" value="Thoát"></td>
    	    
    	    <td>&nbsp;</td>
  	    </tr>


  	  </table>
    </form>
    
</fieldset>
<?php 
	if (isset($_POST["them"]))
	{
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$array=explode(".", $_FILES["up"]["name"]);
		$extension = strtolower(end($array));
		if (in_array($extension, $allowedExts))
		{
			if ($_FILES["up"]["error"] > 0)
			{
				echo "<script>alert('Mã lỗi trả về: " . $_FILES["up"]["error"] . "');<script";
			}
			else
			{	
				if (file_exists("../upload/" . $_FILES["up"]["name"]))
				{
					echo ("<script>alert('".$_FILES["up"]["name"] . " đã tồn tại');</script>");
				}else
				{
					$url="../upload/" . $_FILES["up"]["name"];
					
					$idloai=$_POST["loaisp"];
					$ten=addslashes($_POST["tensp"]);
					$gia=$_POST["gia"];
					$soluong=$_POST["soluong"];
					$idncc=$_POST["ncc"];
					if (isset($_POST["khoa"]))
						$khoa=2;
					else
						$khoa=1;
					$anh="upload/" . $_FILES["up"]["name"];
					$nd=addslashes($_POST["nd"]);
					$nb=$_POST["nb"];
					if ($nd!="")
					{
						$sql="select * from sanpham where tensp = '$ten' and malsp=$idloai";
						if (mysql_num_rows(mysql_query($sql))>0)
							echo "<script>alert('Đã có sản phẩm này!');</script>";
						else
						{
							move_uploaded_file($_FILES["up"]["tmp_name"],$url);
							$sql="insert into sanpham(malsp,tensp,dongia,hinhanh,mota,noibat,mancc,soluong,trangthai,ngaytao) value($idloai,'$ten',$gia,'$anh','$nd',$nb,$idncc,$soluong,$khoa,now())";
							$chay=mysql_query($sql) or die (mysql_error());
							header("location:index.php?page=qlsp");
						}
					}
					else echo "<script>alert('Bạn chưa nhập nội dung');</script>";
				}
			}
		}
		else 
			echo "<script>alert('Lỗi định dạng file');</script>";
	}
	if (isset($_POST["thoat"]))
	{
		header('location:index.php?page=qlsp');
	}


?>
<script>
var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("gia","num","Nhập kiểu số cho Giá");
 frmvalidator.addValidation("soluong","numeric","Nhập kiểu số cho Số lượng");
	function check()
	{
		if (form1.tensp.value=="")
		{
			alert("Bạn chưa nhập tên sản phẩm");
			form1.tensp.focus();
			return false;	
		}
		if (form1.gia.value=="")
		{
			alert("Bạn chưa nhập giá sản phẩm");
			form1.gia.focus();
			return false;	
		}
		if (form1.up.value=="")
		{
			alert("Bạn chưa chọn ảnh sản phẩm");
			form1.up.focus();
			return false;	
		}
		if (form1.soluong.value=="")
		{
			alert("Bạn chưa nhập số lượng sản phẩm");
			form1.soluong.focus();
			return false;	
		}
		else return true;
		
	}


</script>
