<?php
$cp_featured_product_sau_tin_moi=get_field("cp_featured_product_sau_tin_moi","option");
$args=array(
    "post_type"=>"zaproduct",
    "p"=>(float)@$cp_featured_product_sau_tin_moi
);
$the_query_ads_sau_tin_moi=new WP_Query($args);
if($the_query_ads_sau_tin_moi->have_posts()){
    while ($the_query_ads_sau_tin_moi->have_posts()) {
        $the_query_ads_sau_tin_moi->the_post();
        $post_id=$the_query_ads_sau_tin_moi->post->ID;
        $permalink=get_the_permalink(@$post_id);
        $title=get_the_title(@$post_id);
        $excerpt=get_the_excerpt(@$post_id);
        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
        $product_price=get_field("zaproduct_price",@$post_id);
        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
        $product_count_view=get_field("zaproduct_count_view",@$post_id);
        ?>
        <div class="box-ads">
            <a href="<?php echo @$permalink; ?>">
                <img src="<?php echo @$featured_img; ?>">
            </a>
        </div>
        <?php
    }
    wp_reset_postdata();
}
?>
