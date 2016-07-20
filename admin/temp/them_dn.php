<?php
	include("../include/dbconn.php");
?>
<?php
	if (isset($_GET["slsp"]))
		$slsanpham=$_GET["slsp"];
?>

	
<fieldset>
	<legend>Thêm đơn nhập hàng</legend>
<?php include("temp/search-box-sp1.php");?>
    	
<!--
    <form action="" method="post" name="form2">
        	<div>
            <form action="" method="post" class="search-box">
			<input type="text" placeholder="Nhập ngày cần tìm" class="search-field" name="keyword" id="keyword"/>
			<input type="submit" value="Go" name="search-d"/>
            </div>
        </form>
        <script>
		$(document).ready(function(e) {
            $("#keyword").keyup(function(e) {
				//$("#result").html('<div class="content bigsite progress"><img src="templates/user/images/loading.gif"></div>');
				var key=$(this).val().replace(' ','+');
                $("#result").load('index.php?page=search-sp&keyword='+key);
            });
        });
		</script>

   --> 
    
        <form action="" method="post" name="form1">
   
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        
        <tr>
		<td colspan="9">
		
        </td>
         
        </tr>
        	<tr>
            	<td width="100" height="50"> </td>
                <td width="90">Nhà cung cấp</td>
                <td width="144">
                <select name="ncc" id="ncc">
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
            	<option value="<?php echo $idncc;?>"><?php echo $tenncc;?></option>
            <?php
						
					}
					
					
				}
			?>
            </select>
                
                </td>
                <td width="20"> </td>
              <td width="130" colspan="2">Số lượng sản phẩm</td>
                <td width="60"><label for="slsp"></label>
                <input type="text" name="slsp" id="slsp" style="width:35px;"></td>
                <td width="20"><input type="submit" name="ok" id="ok" value="Đồng ý"> </td>
                <td width="100"> </td>
            </tr>
<?php
	if(isset($slsanpham))
	{
		for($i=1;$i<=$slsanpham;$i++)
		{
			?>
            <tr>
                  <td height="50"></td>
                  <td>san pham</td>
                  <td>
                  <select name="loaisp" id="loaisp">
            <?php
				$sql="select * from sanpham";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay))
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$idsp=$ketqua[0];
						$tensp=$ketqua[2];
			?>
            	<option value="<?php echo $idsp;?>"><?php echo $tensp;?></option>
            <?php
						
					}
					
					
				}
			?>
            </select>
                  
                  </td>
                  <td></td>
                  <td width="70">so luong</td>
                  <td width="60"><label for="sl"></label>
                  <input name="sl" type="text" id="sl[]" maxlength="5" style="width:35px;"></td>
                  <td width="60">Đơn giá</td>
                  <td width="60"><label for="sl"></label>
                  <input name="dg" type="text" id="dg[]" maxlength="5" style="width:35px;"></td>
                  <td width="100"> </td>
              </tr>	
              <?php
			
		}
		if(isset($_POST["ok"]))
		{
			$slsp=$_POST["slsp"];	
			header("location: index.php?page=them_dn&slsp=".$slsp);
		}
		
	}
	if(isset($_POST["ok"]))
		{
			$slsp=$_POST["slsp"];	
			header("location: index.php?page=them_dn&slsp=".$slsp);
		}
	


?>
 	
    	

    
    
    </table>
    </form>
 
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
