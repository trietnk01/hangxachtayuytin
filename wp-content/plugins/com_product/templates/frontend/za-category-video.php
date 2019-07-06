<?php
get_header();
$productModel=$zController->getModel("/frontend","ProductModel");
/* start set the_query */
$the_query=null;

$args = $wp_query->query;
$args['orderby']='id';
$args['order']='DESC';
$wp_query->query($args);
$the_query=$wp_query;

/* end set the_query */
/* start setup pagination */
$totalItemsPerPage=14;
$pageRange=3;
$currentPage=1;
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];
}
$productModel->setWpQuery($the_query);
$productModel->setPerpage($totalItemsPerPage);
$productModel->prepare_items();
$totalItems= $productModel->getTotalItems();
$arrPagination=array(
    "totalItems"=>$totalItems,
    "totalItemsPerPage"=>$totalItemsPerPage,
    "pageRange"=>$pageRange,
    "currentPage"=>$currentPage
);
$pagination=$zController->getPagination("Pagination",$arrPagination);
/* end setup pagination */
include get_template_directory()."/block/block-breadcrumb.php";
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <?php include get_template_directory()."/block/block-category-menu-product.php";?>
        </div>
        <div class="col-lg-9">
            <form class="category-video" method="POST">
                <input type="hidden" name="filter_page" value="1" />
                <h1 class="category-video-title"><?php single_cat_title(); ?></h1>
                <?php require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "loop-za-category-video.php"; ?>
            </form>
        </div>
    </div>
</div>
<?php
get_footer();
?>