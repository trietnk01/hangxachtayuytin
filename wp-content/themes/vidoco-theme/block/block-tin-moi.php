<h3 class="tin-moi">Tin mới</h3>
<?php
$args = array(
    'post_type' => 'post',
    'orderby' => 'id',
    'order'   => 'DESC',
    'posts_per_page' =>4,
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => array('tin-tuc'),
    ),
  ),
);
$the_query_tin_moi=new WP_Query($args);
if($the_query_tin_moi->have_posts()){
    ?>
    <div class="bx-tm">
        <?php
        while($the_query_tin_moi->have_posts()){
            $the_query_tin_moi->the_post();
            $post_id=$the_query_tin_moi->post->ID;
            $permalink=get_the_permalink(@$post_id);
            $title=get_the_title(@$post_id);
            $excerpt=get_the_excerpt(@$post_id);
            $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
            $date_post=get_the_date( 'd/m/Y', @$post_id );
            ?>
            <div class="box-one-tin-moi">
                <div class="box-tin-moi-img">
                    <a href="<?php echo @$permalink; ?>">
                        <figure>
                            <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (120/85));"></div>
                        </figure>
                    </a>
                </div>
                <div class="box-tin-moi-info">
                    <h4 class="box-tin-moi-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55, null ); ?></a></h4>
                    <div class="box-tin-moi-date"><?php echo @$date_post; ?></div>
                </div>
                <div class="clr"></div>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <?php
}
?>

