<form action="" method="post" class="search-box">
			<input type="text" placeholder="Nhập tên tài khoản cần tìm" class="search-field" name="keyword" id="keyword"/>
			<input type="submit" value="Go" name="search"/>
</form>

<?php
	if (isset($_POST["search"]))
	{
		header('location:index.php?page=search-a&keyword='.$_POST["keyword"]);
	}

?>

