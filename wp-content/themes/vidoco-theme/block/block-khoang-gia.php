<?php
$q="";
if(isset($_POST["q"])){
    $q=$_POST["q"];
}
$page_id_search_product = $zController->getHelper('GetPageId')->get('_wp_page_template','search-product.php');
$permalink_search_product=get_permalink( $page_id_search_product);
?>
<div class="khoang-gia">Khoảng giá</div>
<form method="POST" action="<?php echo @$permalink_search_product; ?>"  class="frm-price" name="price_form">
    <input type="hidden" name="price_min" value="2000000" />
    <input type="hidden" name="price_max" value="5000000" />
    <div id="filter-price">
    </div>
    <div class="sidebar-content-inner">
      <label for="amount">Từ:</label>
      <input type="text"  readonly id="amount">
  </div>
  <div class="btn-submit">
    <a href="javascript:void(0);" onclick="document.forms['price_form'].submit();">Tìm kiếm</a>
</div>
<div class="clr"></div>
</form>