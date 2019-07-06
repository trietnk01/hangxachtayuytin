<h2 class="giam-gia-dac-biet">Ý kiến khách hàng</h2>
<?php
$args = array(
    'post_type' => 'zaykien',
    'orderby' => 'id',
    'order'   => 'DESC',
    'posts_per_page' => 10,
);
$the_query_customer_idea=new WP_Query($args);
if($the_query_customer_idea->have_posts()){
    ?>
    <div class="owl-carousel-comment owl-carousel owl-theme owl-loaded">
        <?php
        while ($the_query_customer_idea->have_posts()){
            $the_query_customer_idea->the_post();
            $post_id=$the_query_customer_idea->post->ID;
            $permalink=get_the_permalink(@$post_id);
            $title=get_the_title(@$post_id);
            $excerpt=get_the_excerpt(@$post_id);
            $content=get_the_content(@$post_id);
            $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
            ?>
            <div class="item">
                <div class="y-kien-khach-hang-box">
                    <div class="y-kien-avatar">
                        <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (102/102));border-radius: 51px;"></div>
                    </div>
                    <h3 class="y-kien-ten-kh"><?php echo @$title; ?></h3>
                    <div class="y-kien-comment"><?php echo @$excerpt; ?></div>
                    <div class="bix-comment">
                        <?php echo @$content; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <?php

}
?>
