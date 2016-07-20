<form action="" method="post" class="search-box">
			<input type="text" placeholder="Nhập ngày cần tìm" class="search-field" name="keyword" id="keyword"/>
			<input type="submit" value="Go" name="search-d"/>
</form>

<?php
	if (isset($_POST["search-d"]))
	{
		header('location:index.php?page=search-d&keyword='.$_POST["keyword"]);
	}

?>

