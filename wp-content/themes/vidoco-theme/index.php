<?php
/*
	Home template default
*/
	get_header();
	?>
	<h1 style="display: none;"><?php echo bloginfo( "name" ); ?></h1>
    <div class="banner-box">
        <?php
        $data_banner=get_field("hp_banner_rpt","option");{
            if (count(@$data_banner) > 0) {
                ?>
                <div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">
                    <?php
                    foreach ($data_banner as $key => $value) {
                        ?>
                        <div class="item">
                            <img src="<?php echo @$value["hp_banner_item"]; ?>" alt="<?php echo get_bloginfo( 'name', 'raw' ); ?>">
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <?php
    $args = array(
        'post_type' => 'zapartner',
        'orderby' => 'id',
        'order'   => 'DESC',
        'posts_per_page' => -1,
    );
    $the_query_doi_tac=new WP_Query($args);
    if($the_query_doi_tac->have_posts()){
        ?>
        <div class="box-doi-tac">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="owl-carousel-brand owl-carousel owl-theme owl-loaded">
                            <?php
                            while($the_query_doi_tac->have_posts()) {
                                $the_query_doi_tac->the_post();
                                $post_id=$the_query_doi_tac->post->ID;
                                $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                ?>
                                <div class="item">
                                    <div class="brand-item">
                                        <a href="javascript:void(0);">
                                            <figure>
                                                <img src="<?php echo $featured_img; ?>" alt="<?php echo get_bloginfo( 'name', 'raw' ); ?>" style="width:150px;">
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="khuyen-mai-box">
        <div class="container">
            <?php
            $hp_khuyen_mai_rpt=get_field("hp_khuyen_mai_rpt","option");
            if(count(@$hp_khuyen_mai_rpt) > 0){
                ?>
                <div class="row">
                    <div class="col">
                        <h2 class="khuyen-mai-theo-ngay">
                            Khuyến mãi theo ngày
                        </h2>
                        <div class="owl-carousel-sale-off-on-day owl-carousel owl-theme owl-loaded">
                            <?php
                            foreach ($hp_khuyen_mai_rpt as $key => $value){
                                $post_id=$value["hp_zaproduct_khuyen_mai_item"];
                                $args=array(
                                    "post_type"=>"zaproduct",
                                    "p"=>@$post_id
                                );
                                $the_query_khuyen_mai=new WP_Query($args);
                                if($the_query_khuyen_mai->have_posts()){
                                    while ($the_query_khuyen_mai->have_posts()) {
                                        $the_query_khuyen_mai->the_post();
                                        $post_id=$the_query_khuyen_mai->post->ID;
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
                                            <div class="sale-off-on-day-box-item">
                                                <div class="sale-off-box-hinh-tron">
                                                    <a href="<?php echo @$permalink; ?>">
                                                        <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>" style="width:150px;">
                                                    </a>
                                                    <?php
                                                    if(floatval(@$product_price_desc_percent) > 0){
                                                        ?>
                                                        <div class="sale-off-box">
                                                            <div class="sale-off-txt">Sale off</div>
                                                            <div class="sale-off-number"><?php echo floatval(@$product_price_desc_percent) ; ?>%</div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <h3 class="sale-off-on-day-title">
                                                    <a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55, "[...]" ) ?></a>
                                                    <div class="post-kk-star-rating">
                                                        <?php echo do_shortcode( "[ratings]" ); ?>
                                                    </div>
                                                </h3>
                                                <div class="sale-off-on-day-price">
                                                    <span class="sale-off-on-day-sale-price"><?php echo fnPrice(@$product_sale_price) ; ?> ₫</span>
                                                    <?php
                                                    if(floatval(@$product_price) > floatval(@$product_sale_price)){
                                                        ?>
                                                        <span class="sale-off-on-day-sale-original-price"><?php echo fnPrice(@$product_price); ?> ₫</span>
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
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            $hp_banner_v2_rpt=get_field("hp_banner_v2_rpt","option");
            if(count(@$hp_banner_v2_rpt) > 0){
                ?>
                <div class="row">
                    <div class="col">
                        <div class="box-ads-banner">
                            <?php
                            foreach (@$hp_banner_v2_rpt as $key => $value) {
                                ?>
                                <div class="box-ads-item">
                                    <a href="javascript:void(0);">
                                        <img src="<?php echo @$value["hp_banner_v2_item"]; ?>" alt="<?php echo get_bloginfo( 'name', 'raw' ); ?>">
                                        <div class="panel-top-to-bottom"></div>
                                        <div class="panel-bottom-to-top"></div>
                                        <div class="panel-link">
                                            <div class="panel-circle">
                                                <i class="fas fa-link"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col">
                    <div class="tai-sao-nen-mua">
                        <div class="tai-sao-nen-mua-text">Tại sao nên mua đồng hồ</div>
                        <h2 class="khuyen-mai-theo-ngay margin-top-20">Tại <?php echo get_bloginfo( 'name', 'raw' ); ?> ?</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include get_template_directory()."/block/block-hon-mot-trieu-nguoi-tin-dung.php";
    ?>
    <div class="box-san-pham-ban-chay">
        <div class="container">
            <?php
            $hp_spbc_rpt=get_field("hp_spbc_rpt","option");
            if(count(@$hp_spbc_rpt) > 0){
                ?>
                <div class="row">
                    <div class="col">
                        <h2 class="khuyen-mai-theo-ngay">Sản phẩm bán chạy</h2>
                        <div class="owl-carousel-spbc owl-carousel owl-theme owl-loaded">
                            <?php
                            $j=0;
                            $k=0;
                            foreach($hp_spbc_rpt as $key => $value) {
                                if($j % 8 == 0){
                                    echo '<div class="item">';
                                }
                                if($k % 4==0){
                                    echo '<div class="row">';
                                }
                                $post_id=$value["hp_spbc_item"];
                                $args=array(
                                    "post_type"=>"zaproduct",
                                    "p"=>@$post_id
                                );
                                $the_query_spbc=new WP_Query($args);
                                if($the_query_spbc->have_posts()){
                                    while ($the_query_spbc->have_posts()) {
                                        $the_query_spbc->the_post();
                                        $post_id=$the_query_spbc->post->ID;
                                        $permalink=get_the_permalink(@$post_id);
                                        $title=get_the_title(@$post_id);
                                        $excerpt=get_the_excerpt(@$post_id);
                                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                        $product_price=get_field("zaproduct_price",@$post_id);
                                        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                                        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                                        $product_count_view=get_field("zaproduct_count_view",@$post_id);
                                        ?>
                                        <div class="col-md-3">
                                            <div class="sale-off-on-day-box-item">
                                                <div class="sale-off-box-hinh-tron">
                                                    <a href="<?php echo @$permalink; ?>">
                                                        <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>">
                                                    </a>
                                                    <?php
                                                    if(floatval(@$product_price_desc_percent) > 0){
                                                        ?>
                                                        <div class="sale-off-box">
                                                            <div class="sale-off-txt">Sale off</div>
                                                            <div class="sale-off-number"><?php echo floatval(@$product_price_desc_percent) ; ?>%</div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <h3 class="sale-off-on-day-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55, "[...]" ) ?></a>
                                                    <div class="post-kk-star-rating">
                                                        <?php echo do_shortcode( "[ratings]" ); ?>
                                                    </div>
                                                </h3>
                                                <div class="sale-off-on-day-price">
                                                    <span class="sale-off-on-day-sale-price"><?php echo fnPrice(@$product_sale_price) ; ?> ₫</span>
                                                    <?php
                                                    if(floatval(@$product_price) > floatval(@$product_sale_price)){
                                                        ?>
                                                        <span class="sale-off-on-day-sale-original-price"><?php echo fnPrice(@$product_price); ?> ₫</span>
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
                                $k++;
                                $j++;
                                if($k % 4==0 || $k == 8){
                                    echo '</div>';
                                }
                                if($j % 8 == 0 || $j == 16){
                                    echo '</div>';
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row margin-top-30">
                <div class="col">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'id',
                        'order'   => 'DESC',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => array('tin-tuc'),
                        ),
                      ),
                    );
                    $the_query_tin_tuc=new WP_Query($args);
                    if($the_query_tin_tuc->have_posts()){
                        ?>
                        <h2 class="khuyen-mai-theo-ngay">Tin tức</h2>
                        <div class="box-featured-news">
                            <div class="row">
                                <?php
                                while($the_query_tin_tuc->have_posts()) {
                                    $the_query_tin_tuc->the_post();
                                    $post_id=$the_query_tin_tuc->post->ID;
                                    $permalink=get_the_permalink(@$post_id);
                                    $title=get_the_title(@$post_id);
                                    $excerpt=get_the_excerpt(@$post_id);
                                    $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                    $date_post=get_the_date( 'd/m/Y', @$post_id );
                                    ?>
                                    <div class="col-md-4">
                                        <div class="box-item-news">
                                            <div class="box-item-news-img">
                                                <a href="<?php echo @$permalink; ?>">
                                                    <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$permalink; ?>">
                                                    <div class="panel-top-to-bottom"></div>
                                                    <div class="panel-bottom-to-top"></div>
                                                    <div class="panel-link">
                                                        <div class="panel-circle">
                                                            <i class="fas fa-link"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <h3 class="box-item-news-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title, 25,"[...]" ); ?></a></h3>
                                            <div class="box-item-news-excerpt">
                                                <?php echo wp_trim_words( @$excerpt,55,"[...]" ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                wp_reset_postdata();
                                $term_tin_tuc=get_term_by( "slug",'tin-tuc','category',  OBJECT,'raw' );
                                $term_tin_tuc_permalink=get_term_link( @$term_tin_tuc, 'category' );
                                ?>
                            </div>
                            <div class="row news-readmore">
                                <div class="col">
                                    <a href="<?php echo @$term_tin_tuc_permalink; ?>">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    ?>