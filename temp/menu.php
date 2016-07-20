<?php
	include("include/dbconn.php");
?>
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'><span><div style="text-transform:uppercase;">Trang chủ</div></span></a></li>
<?php
	$sql="SELECT * FROM danhmucsp where trangthai=1 order by madanhmuc asc";
			$chay=mysql_query($sql) or die (mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					$idmuc=$ketqua[0];
					$tenmuc=$ketqua[1];

?>
   <li class='has-sub'><a href='index.php?page=sp&idmuc=<?php echo $idmuc;?>'><span><div style="text-transform:uppercase;"><?php echo $tenmuc;?></div></span></a>
      <ul>
               <?php
			   		$sql1="select * from loaisp where madanhmuc=$idmuc and trangthai=1";
					$chay1=mysql_query($sql1);
					while ($ketqua1=mysql_fetch_array($chay1))
					{
						$idloai=$ketqua1[0];
						$tenloai=$ketqua1[2];
			   ?>
               			<li><a href='index.php?page=sp&idloai=<?php echo $idloai;?>'><span><div style="text-transform:uppercase;"><?php echo $tenloai;?></div></span></a></li>
               <?php
					}
				?>
      </ul>
   </li>
   <?php
				}
			}
				?>
      
   <li class='has-sub'><a href='index.php?page=lh'><span><div style="text-transform:uppercase;">Liên hệ</div></span></a></li>   
   <li class='has-sub'><a href='index.php?page=hd'><span><div style="text-transform:uppercase;">Hỏi đáp</div></span></a></li> 
</ul>
</div>