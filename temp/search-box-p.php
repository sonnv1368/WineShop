<form action="" method="post" class="search-box">
			<input type="text" placeholder="Nhập tên rượu cần tìm" class="search-field" name="keyword" id="keyword" autocomplete="	on"/>
			<input type="submit" value="Go" name="search"/>
</form>

<?php
	if (isset($_POST["search"]))
	{
		header('location:index.php?page=search-p&keyword='.$_POST["keyword"]);
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

