<form name="frm_search_article" action="" method="POST" class="frm-search-prduct">
	<input type="text" name="s" value="<?php echo @$_POST["s"]; ?>" autocomplete="off" class="product-name-txt">
	<div class="btn-tim-kiem">
		<a href="javascript:void(0);" onclick="document.forms['frm_search_article'].submit();">Tìm bài viết</a>
	</div>	
</form>