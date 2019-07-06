<?php
$args = array(
    'post_type' => 'post',
    'orderby' => 'id',
    'order'   => 'DESC',
    'posts_per_page' =>6,
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => array('tin-tuc'),
    ),
  ),
);
$the_query_related_news=new WP_Query($args);
if($the_query_related_news->have_posts()){
    ?>
    <div class="txnnhat-tuan">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h2 class="tin-xem-nhieu-nhat-tuan">Tin xem nhiều nhất tuần</h2>
                </div>
            </div>
            <div class="margin-top-10">
                <?php
                $k=0;
                while($the_query_related_news->have_posts()){
                    $the_query_related_news->the_post();
                    $post_id=$the_query_related_news->post->ID;
                    $permalink=get_the_permalink(@$post_id);
                    $title=get_the_title(@$post_id);
                    $excerpt=get_the_excerpt(@$post_id);
                    $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                    $date_post=get_the_date( 'd/m/Y', @$post_id );
                    if($k%3==0){
                        echo '<div class="row">';
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="box-tnntuan">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="<?php echo @$permalink; ?>">
                                        <figure>
                                            <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (130/70));"></div>
                                        </figure>
                                    </a>
                                </div>
                                <div class="col-sm-9">
                                    <h3 class="tin-xem-nhieu-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55, null ); ?></a></h3>
                                    <div class="tin-xem-nhieu-date-post">
                                        <span><?php echo @$date_post; ?></span>
                                        <span class="margin-left-5">-</span>
                                        <span class="margin-left-5">22 lượt xem</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $k++;
                    if($k%3==0 || $k==$the_query_related_news->post_count){
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
