<div class="tara-giam-gia-dac-biet">
    <h2 class="giam-gia-dac-biet">Giảm giá đặc biệt</h2>
    <?php
    $hp_giam_gia_dac_biet_rpt=get_field("hp_giam_gia_dac_biet_rpt","option");
    if(count(@$hp_giam_gia_dac_biet_rpt) > 0){
        ?>
        <div class="owl-carousel-sach-giam-gia-dac-biet owl-carousel owl-theme owl-loaded">
            <?php
            foreach ($hp_giam_gia_dac_biet_rpt as $key => $value){
                $post_id=$value["hp_giam_gia_dac_biet_item"];
                $args=array(
                    "post_type"=>"zaproduct",
                    "p"=>@$post_id
                );
                $the_query_special_sale=new WP_Query($args);
                if($the_query_special_sale->have_posts()){
                    while ($the_query_special_sale->have_posts()) {
                        $the_query_special_sale->the_post();
                        $post_id=$the_query_special_sale->post->ID;
                        $permalink=get_the_permalink(@$post_id);
                        $title=get_the_title(@$post_id);
                        $excerpt=get_the_excerpt(@$post_id);
                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                        $product_price=get_field("zaproduct_price",@$post_id);
                        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                        $product_count_view=get_field("zaproduct_count_view",@$post_id);
                        ?>
                        <div class="item">
                            <div class="box-product bx-pr-duct">
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
                                            <div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (140/218))"></div>
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
                                    <h3 class="box-product-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( $title, 55, null ); ?></a></h3>
                                    <div class="box-product-price">
                                        <div class="box-pr-price-1"><span><?php echo fnPrice(@$product_sale_price); ?></span><span class="margin-left-5">đ</span></div>
                                        <?php
                                        if((float)@$product_price_desc_percent > 0){
                                            ?>
                                            <div class="box-pr-price-2">-<?php echo @$product_price_desc_percent; ?>%</div>
                                            <?php
                                        }
                                        ?>
                                        <div class="clr"></div>
                                    </div>
                                    <?php
                                    if((float)@$product_sale_price < (float)@$product_price){
                                        ?>
                                        <div class="box-product-price-through-margin">
                                            <span class="bx-pr-pr-through"><span><?php echo fnPrice(@$product_price); ?></span><span class="margin-left-5">₫</span></span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="danh-gia-bang-ngoi-sao">
                                        <div class="ngoi-sao">
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                        <div class="number-user">
                                            <?php echo fnPrice(@$product_count_view);  ?>
                                        </div>
                                        <div class="box-product-user">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
