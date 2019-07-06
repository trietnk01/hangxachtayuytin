<?php 
$page_id_search_product = $zController->getHelper('GetPageId')->get('_wp_page_template','template-6-search-product.php'); 
$permalink_search_product=get_permalink( $page_id_search_product);
?>
<form name="frm_search_product" action="<?php echo @$permalink_search_product; ?>" method="POST" class="frm-search-prduct">
	<input type="text" name="q" value="<?php echo @$_POST["q"]; ?>" class="product-name-txt">
	<div class="btn-tim-kiem">
		<a href="javascript:void(0);" onclick="document.forms['frm_search_product'].submit();">Tìm sản phẩm</a>
	</div>	
</form>