<h2 class="giam-gia-dac-biet">Sách tái bản hàng tháng</h2>
<?php
$cp_product_hot_month_rpt=get_field("cp_product_hot_month_rpt","option");
if(count($cp_product_hot_month_rpt) > 0){
    ?>
    <div class="sach-tai-ban-hang-thang-box">
        <div class="owl-carousel-sach-tai-ban-hang-thang owl-carousel owl-theme owl-loaded">
            <?php
            $j=0;
            foreach ($cp_product_hot_month_rpt as $key => $value) {
                if($j % 4 == 0){
                    echo '<div class="item">';
                }
                $post_id=$value["cp_product_hot_month_item"];
                $args=array(
                    "post_type"=>"zaproduct",
                    "p"=>@$post_id
                );
                $the_query_cp_product_hot_month_rpt=new WP_Query($args);
                if($the_query_cp_product_hot_month_rpt->have_posts()){
                    while ($the_query_cp_product_hot_month_rpt->have_posts()) {
                        $the_query_cp_product_hot_month_rpt->the_post();
                        $post_id=$the_query_cp_product_hot_month_rpt->post->ID;
                        $permalink=get_the_permalink(@$post_id);
                        $title=get_the_title(@$post_id);
                        $excerpt=get_the_excerpt(@$post_id);
                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                        $product_price=get_field("zaproduct_price",@$post_id);
                        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                        $product_count_view=get_field("zaproduct_count_view",@$post_id);
                        ?>
                        <div class="item-sbc">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4">
                                    <a href="<?php echo @$permalink; ?>" class="a-sbc">
                                        <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (80/100));"></div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-8">
                                    <h3 class="sbc-title"><a href="javascript:void(0);"><?php echo wp_trim_words( $title, 5,null ); ?></a></h3>
                                    <div class="ngoi-sao-sp-tt">
                                        <span><i class="far fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <div class="spbc-price">
                                        <?php echo fnPrice(@$product_sale_price); ?> đ
                                    </div>
                                    <?php
                                    if((float)@$product_sale_price < (float)@$product_price){
                                        ?>
                                        <div class="spbc-price-line-through">
                                            <?php echo fnPrice(@$product_price); ?> đ
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
                $j++;
                if($j % 4 == 0 || $j == count(@$cp_product_hot_month_rpt)){
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <?php
}
?>
