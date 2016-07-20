<form action="" method="post" class="search-box">
			<input type="text" placeholder="Nhập sản phẩm cần tìm" class="search-field" name="keyword" id="keyword"/>
			<input type="submit" value="Go" name="search-d"/>
</form>

<?php
	if (isset($_POST["search-d"]))
	{
		header('location:index.php?page=search-sp1&keyword='.$_POST["keyword"]);
	}

?>
<script>
		$(document).ready(function(e) {
            $("#keyword").keyup(function(e) {
				//$("#result").html('<div class="content bigsite progress"><img src="templates/user/images/loading.gif"></div>');
				var key=$(this).val().replace(' ','+');
                $("#result").load('index.php?page=search-sp1&keyword='+key); 
            });
        });
		</script>
