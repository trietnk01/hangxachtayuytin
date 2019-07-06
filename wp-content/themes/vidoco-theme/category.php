<?php
get_header();
$productModel=$zController->getModel("/frontend","ProductModel");
/* start set the_query */
$the_query_category=null;

$args = $wp_query->query;
$args['orderby']='id';
$args['order']='DESC';
$s="";
if(isset($_POST["s"])){
    $s=trim($_POST["s"]);
}
if(!empty(@$s)){
    $args["s"] =@$s;
}
$wp_query->query($args);
$the_query_category=$wp_query;
/* end set the_query */
/* start setup pagination */
$totalItemsPerPage=4;
$pageRange=3;
$currentPage=1;
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];
}
$productModel->setWpQuery($the_query_category);
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
?>
<h1 style="display: none;"><?php echo get_bloginfo( 'name', 'raw' ); ?></h1>
<?php include get_template_directory()."/block/block-slide-trang-con.php"; ?>
<div class="box-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php include get_template_directory()."/block/block-breadcrumb.php"; ?>
            </div>
        </div>
    </div>
</div>
<div class="container box-category">
    <div class="row">
        <div class="col">
            <h2 class="khuyen-mai-theo-ngay"><?php single_cat_title( '', true ); ?></h2>
            <?php
            if($the_query_category->have_posts()){
                ?>
                <form class="category-box" method="POST">
                    <input type="hidden" name="filter_page" value="1" />
                    <div class="box-news-list">
                        <?php
                        $i=0;
                        while($the_query_category->have_posts()) {
                            $the_query_category->the_post();
                            $post_id=$the_query_category->post->ID;
                            $title=get_the_title($post_id);
                            $permalink=get_the_permalink($post_id);
                            $date_post=get_the_date( 'd/m/Y',@$post_id );
                            $featured_img=get_the_post_thumbnail_url($post_id, 'full');
                            $excerpt=get_field("single_article_excerpt",@$post_id);
                            if($i%2==0){
                                ?>
                                <div class="box-news-item">
                                    <div class="box-news-item-1">
                                        <div class="box-item-news-img">
                                            <a href="<?php echo @$permalink; ?>">
                                                <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>">
                                                <div class="panel-top-to-bottom"></div>
                                                <div class="panel-bottom-to-top"></div>
                                                <div class="panel-link">
                                                    <div class="panel-circle">
                                                        <i class="fas fa-link"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box-news-item-2">
                                        <div class="box-news-information">
                                            <h3 class="box-news-information-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title,55,"[...]" ); ?></a></h3>
                                            <div class="box-news-information-excerpt"><?php echo wp_trim_words( @$excerpt, 55, null ); ?></div>
                                            <div class="box-news-information-date-post"><?php echo @$date_post; ?></div>
                                            <div class="news-readmore2 margin-top-10">
                                                <a href="<?php echo @$permalink; ?>">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="box-news-item">
                                    <div class="box-news-item-2">
                                        <div class="box-news-information">
                                            <h3 class="box-news-information-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55,"[...]" ); ?></a></h3>
                                            <div class="box-news-information-excerpt"><?php echo wp_trim_words( @$excerpt, 55, null ); ?></div>
                                            <div class="box-news-information-date-post"><?php echo @$date_post; ?></div>
                                            <div class="news-readmore2 margin-top-10">
                                                <a href="<?php echo @$permalink; ?>">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-news-item-1">
                                        <div class="box-item-news-img">
                                            <a href="<?php echo @$permalink; ?>">
                                                <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>">
                                                <div class="panel-top-to-bottom"></div>
                                                <div class="panel-bottom-to-top"></div>
                                                <div class="panel-link">
                                                    <div class="panel-circle">
                                                        <i class="fas fa-link"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <?php
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="category-pagination"><?php echo @$pagination->showPagination();?></div>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>