<form action="" method="post" class="search-box">
			<input type="text" placeholder="Nhập mã hóa đơn cần tìm" class="search-field" name="keyword" id="keyword"/>
			<input type="submit" value="Go" name="search-o"/>
</form>

<?php
	if (isset($_POST["search-o"]))
	{
		header('location:index.php?page=search-o&keyword={$keyword}&keyword='.$_POST["keyword"]);
	}

?>

