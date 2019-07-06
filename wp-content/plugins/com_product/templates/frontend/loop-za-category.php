<?php
if($the_query_product->have_posts()){
    ?>
    <div class="za-category-wrapper">
        <?php
        $k=0;
        while($the_query_product->have_posts()) {
            $the_query_product->the_post();
            $post_id=$the_query_product->post->ID;
            $permalink=get_the_permalink(@$post_id);
            $title=get_the_title(@$post_id);
            $excerpt=get_the_excerpt(@$post_id);
            $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
            $product_price=get_field("zaproduct_price",@$post_id);
            $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
            $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
            $product_count_view=get_field("zaproduct_count_view",@$post_id);
            if($k%3==0){
                echo '<div class="row">';
            }
            ?>
            <div class="col-md-4">
                <div class="box-product bx-pr-bottom">
                    <div class="box-sso">
                        <a href="javascript:void(0);" class="a-overlay">
                            <?php
                            if((float)@$product_price_desc_percent > 0){
                                ?>
                                <div class="percent-sale">
                                    <div class="box-cent-sale">
                                        -<?php echo @$product_price_desc_percent; ?>%
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="box-img">
                                <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>">
                            </div>
                            <div class="overlay">
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="a-add-to-cart" data-toggle="modal" data-target="#modal-alert-add-cart" onclick="addToCart(<?php echo @$post_id; ?>,1);" >
                            <div class="a-bg-add-to-cart">
                                <span><i class="fas fa-shopping-cart"></i></span>
                                <span class="margin-left-5 a-add-mua-ngay">Mua ngay</span>
                            </div>
                        </a>
                    </div>
                    <div class="box-product-info">
                        <h3 class="box-product-title">
                            <a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title, 55, null ); ?></a>
                        </h3>
                        <div class="post-kk-star-rating">
                            <?php echo do_shortcode( "[ratings]" ); ?>
                        </div>
                        <?php
                        if((float)@$product_sale_price < (float)@$product_price){
                            ?>
                            <div class="box-product-price">
                                <span class="box-pr-price-1"><?php echo fnPrice(@$product_sale_price); ?> đ</span>
                                <span class="box-pr-price-2"><?php echo fnPrice(@$product_price); ?> đ</span>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="box-product-price">
                                <span class="box-pr-price-1"><?php echo fnPrice(@$product_sale_price); ?> đ</span>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            $k++;
            if($k%3==0 || $k==$the_query_product->post_count){
                echo '</div>';
            }
        }
        wp_reset_postdata();
        ?>
    </div>
    <div class="margin-top-15">
        <?php echo @$pagination->showPagination(); ?>
    </div>
    <?php
}else{
    ?>
    <div class="text-center margin-top-15">Đang cập nhật</div>
    <?php
}
?>