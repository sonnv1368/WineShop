<?php
	ob_start();
	include("../include/dbconn.php");
?>
<?php
	$id=$_GET["id"];
	$sql="select * from sanpham where masp=$id";
	$chay=mysql_query($sql);
	if (mysql_num_rows($chay)>0)
	{
		while ($ketqua=mysql_fetch_array($chay))
		{
			$idl=$ketqua[2];
			$ncc=$ketqua[1];
			
			$tensp=$ketqua[3];
			$giasp=$ketqua[5];
			$anhsp=$ketqua[6];
			$ndung=stripslashes($ketqua[4]);
			$nbat=$ketqua[8];
			$soluong=$ketqua[7];
			$khoa=$ketqua[10];
		}
		
	}
?>
<?php
	if (isset($_GET["sc"])==true)
	{
		if ($_GET["sc"]==1)
			echo "<script>alert('Sửa thành công');</script>";
	}
?>

<script>
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
		else return true;
		
	}


</script>
<fieldset>
	<legend>Thêm sản phẩm</legend>
    <form method="post" name="form1" action="" enctype="multipart/form-data" >
   	  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
    	<td align="center" colspan="8"><font color="#0000ff" size="4" face="Tahoma"><strong>SỬA SẢN PHẨM</strong></font></td>
    </tr>
    	  <tr>
    	    <td width="10" height="30">&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td width="10">&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td rowspan="3"><img src="../<?php echo $anhsp;?>" height="95" width="95"></td>
  	    </tr>
    	  <tr>
    	    <td height="30">&nbsp;</td>
    	    <td width="170" align="right" valign="middle">Tên sản phẩm</td>
    	    <td>&nbsp;</td>
    	    <td align="left" valign="middle" width="150"><div class="thefield"><input name="tensp" type="text" id="tensp" size="30" value="<?php echo $tensp;?>"></div></td>
    	    <td align="left" valign="middle"></td>
    	    <td rowspan="2"></td>
  	    </tr>
    	  <tr>
    	    <td height="30">&nbsp;</td>
    	    <td align="right" valign="middle">Giá</td>
    	    <td>&nbsp;</td>
    	    <td valign="middle" align="left"><div class="thefield"><input name="gia" type="text" id="gia" size="30" value="<?php echo $giasp;?>"></div></td>
    	    <td align="left" valign="middle">VNĐ</td>
    	    <td>&nbsp;</td>
  	    </tr>
    	  <tr>
    	    <td height="30">&nbsp;</td>
    	    <td align="right" valign="middle">Upload ảnh</td>
    	    <td>&nbsp;</td>
    	    <td align="left" valign="middle" colspan="3"><div class="thefield"><input type="file" name="up"></div></td>
  	    </tr>
    	  <tr>
    	    <td height="30">&nbsp;</td>
    	    <td align="right" valign="middle">Nội dung</td>
    	    <td>&nbsp;</td>
    	    <td colspan="3" align="left" valign="middle">         
            <textarea name="nd" id="nd" cols="45" rows="10" style="width: 553px; height: 254px;"><?php echo $ndung;?></textarea></td>
    	    
  	    </tr>
    	  <tr>
    	    <td height="30">&nbsp;</td>
    	    <td align="right" valign="middle">Sản phẩm nổi bật</td>
    	    <td></td>
    	    <td align="left" valign="middle">
            <div class="thefield">
    	      <select name="nb" id="nb">
    	        <option value="0" <?php if ($nbat==0) echo "selected";?>>Không</option>
    	        <option value="1" <?php if ($nbat==1) echo "selected";?>>Có</option>
            </select></div></td>
    	    <td align="right" valign="right">Số lượng</td>
    	    <td valign="middle" align="left"> <div class="thefield"><input name="soluong" type="text" id="soluong" size="30" value="<?php echo $soluong;?>" style="width:47px; margin-left:10px;" ></div></td>
  	    </tr>
    	 <tr>
    	    <td height="30">&nbsp;</td>
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
            	<option value="<?php echo $idloai;?>" <?php if ($idloai==$idl) echo "selected";?>><?php echo $tenloai;?></option>
            <?php
						
					}
					
					
				}
			?>
            </select></div>
            </td>
    	    <td align="right">Khóa</td>
    	    <td><input type="checkbox" name="khoa" <?php if ($khoa==2) echo "checked"; ?> style=" margin-left:10px;" /></td>
        <tr>
    	    <td height="30">&nbsp;</td>
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
            	<option value="<?php echo $idncc;?>" <?php if ($idncc==$ncc) echo "selected";?>><?php echo $tenncc;?></option>
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
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td colspan="2" align="right"><input class="newbt-cn" type="submit" name="sua" id="sua" value="Sửa" onclick="return check()">
   	        &nbsp;&nbsp;&nbsp;&nbsp;<input class="newbt-cn" type="submit" name="thoat" id="thoat" value="Thoát"></td>
    	    <td>&nbsp;</td>
  	    </tr>


  	  </table>
    </form>
    
</fieldset>
<?php 
	if (isset($_POST["sua"])) 
	{
		$idloai=$_POST["loaisp"];
		$ten=addslashes($_POST["tensp"]);
		$gia=$_POST["gia"];
		$soluong=$_POST["soluong"];
		$idncc=$_POST["ncc"];
		if (isset($_POST["khoa"]))
			$khoa=2;
		else
			$khoa=1;
		$anh="/upload/" . $_FILES["up"]["name"];
		$nd=addslashes($_POST["nd"]);
		$nb=$_POST["nb"];
		if ($nd!="")
		{
			if ($_FILES["up"]["name"]=="")
			{
				$sql="select * from sanpham where tensp = '$ten' and masp<>$id";
				echo $sql;
				if (mysql_num_rows(mysql_query($sql))>0)
					{
						echo "<script>alert('Đã có sản phẩm này!');</script>";
					}
					else
					{
					$sql="update sanpham set malsp=$idloai,tensp='$ten',dongia='$gia',mota='$nd',noibat=$nb,soluong=$soluong,mancc='$idncc',trangthai=$khoa where masp=$id";
					$chay=mysql_query($sql);
					header("Location:index.php?page=sua_sp&id=".$id."&sc=1");
					}
			}
			else
			{
				$allowedExts = array("jpg", "jpeg", "gif", "png");
				$array=explode(".", $_FILES["up"]["name"]);
				$extension = strtolower(end($array));
				if (in_array($extension, $allowedExts))
				{
					unlink("../$anh");
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
							move_uploaded_file($_FILES["up"]["tmp_name"],$url);
							$idloai=$_POST["loaisp"];
							if (isset($_POST["khoa"]))
								$khoa=2;
							else
								$khoa=1;
							$ten=addslashes($_POST["tensp"]);
							$gia=$_POST["gia"];
							$soluong=$_POST["soluong"];
							$anh="upload/" . $_FILES["up"]["name"];
							$nd=addslashes($_POST["nd"]);
							$nb=$_POST["nb"];
							$sql="select * from sanpham where tensp = '$ten' and masp<>$id";
							if (mysql_num_rows(mysql_query($sql))>0)
								echo "<script>alert('Đã có sản phẩm này!');</script>";
							else
							{
							$sql="update sanpham set malsp=$idloai, tensp='$ten', dongia='$gia', mota='$nd', noibat=$nb, soluong=$soluong, hinhanh='$anh',mancc='$idncc',trangthai=$khoa where masp=$id";
							$chay=mysql_query($sql);
							move_uploaded_file($_FILES["up"]["tmp_name"],$url);
							header("Location:index.php?page=sua_sp&id=".$id."&sc=1");
						}  }
					}
				}
				else 
					echo "<script>alert('Lỗi định dạng file');</script>";
			}	
		}
		else echo "<script>alert('Bạn chưa nhập nội dung');</script>";
		
	}
	if (isset($_POST["thoat"]))
	{
		header('location:index.php?page=qlsp');
	}
?>
