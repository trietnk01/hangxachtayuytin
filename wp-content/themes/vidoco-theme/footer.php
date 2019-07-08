<?php
/*

Footer template

*/
$args = array(
  'post_type' => 'zaykien',
  'orderby' => 'id',
  'order'   => 'DESC',
  'posts_per_page' => -1,
);
$the_query_y_kien=new WP_Query(@$args);
if($the_query_y_kien->have_posts()){
  ?>
  <div class="content-bottom">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="ryse-of-rome">
            <div class="owl-carousel-customer owl-carousel owl-theme owl-loaded">
              <?php
              while($the_query_y_kien->have_posts()) {
                $the_query_y_kien->the_post();
                                    $post_id=$the_query_y_kien->post->ID;

                                    $title=get_the_title(@$post_id);
                                    $content=apply_filters( "the_content", get_the_content( null,false ));
                                    $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                ?>
                <div class="item">
                  <div class="box-customer">
                    <div class="box-customer-img">
                      <a href="javascript:void(0);">
                        <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>">
                      </a>
                    </div>
                    <h4 class="box-customer-title"><?php echo wp_trim_words( @$title, 55,"[...]" ); ?></h4>
                    <div class="box-customer-excerpt">
                      <?php echo wp_trim_words($content, 55, "[...]" ); ?>
                    </div>
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
  </div>
  <?php
}
?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-xl-2">
        <div class="box-logo">
          <a href="<?php echo site_url( '', null ); ?>">
            <div style="background-image: url('<?php echo get_template_directory_uri()."/assets/images/logo-gowatch-2.svg" ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (205/60));"></div>
          </a>
        </div>
        <div class="dang-ky-thong-tin-moi-tu-go-watch">Đăng ký thông tin mới từ <?php echo get_bloginfo( 'name','raw' ); ?></div>
        <form class="dang-ky-ngay-box" name="frm_subcribe" method="POST">
          <div class="dang-ky-ngay-txt"><input type="text" name="email" placeholder="Nhập email của bạn..." autocomplete="off"></div>
          <div class="dang-ky-ngay-btn">
            <a href="javascript:void(0);" onclick="registerSubcriber(this);">Gửi</a>
          </div>
          <div class="ajax-box">
            <div class="ajax_loader_1"></div>
          </div>
          <div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>
        </form>
      </div>
      <div class="col-xl-8">
        <div class="footer-menu-group">
          <div class="footer-menu-box">
            <h3 class="footer-menu-h"><?php echo wp_get_nav_menu_name("footer_1"); ?></h3>
            <?php
            $args = array(
              'menu'              => '',
              'container'         => '',
              'container_class'   => '',
              'container_id'      => '',
              'menu_class'        => 'footer-menu-ul',
              'echo'              => true,
              'fallback_cb'       => 'wp_page_menu',
              'before'            => '',
              'after'             => '',
              'link_before'       => '',
              'link_after'        => '',
              'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'             => 3,
              'walker'            => '',
              'theme_location'    => 'footer_1' ,
              'menu_li_actived'       => 'current-menu-item',
              'menu_item_has_children'=> 'menu-item-has-children',
            );
            wp_nav_menu($args);
            ?>
          </div>
          <div class="footer-menu-box">
            <h3 class="footer-menu-h"><?php echo wp_get_nav_menu_name("footer_2"); ?></h3>
            <?php
            $args = array(
              'menu'              => '',
              'container'         => '',
              'container_class'   => '',
              'container_id'      => '',
              'menu_class'        => 'footer-menu-ul',
              'echo'              => true,
              'fallback_cb'       => 'wp_page_menu',
              'before'            => '',
              'after'             => '',
              'link_before'       => '',
              'link_after'        => '',
              'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'             => 3,
              'walker'            => '',
              'theme_location'    => 'footer_2' ,
              'menu_li_actived'       => 'current-menu-item',
              'menu_item_has_children'=> 'menu-item-has-children',
            );
            wp_nav_menu($args);
            ?>
          </div>
          <div class="footer-menu-box">
            <h3 class="footer-menu-h"><?php echo wp_get_nav_menu_name("footer_3"); ?></h3>
            <?php
            $args = array(
              'menu'              => '',
              'container'         => '',
              'container_class'   => '',
              'container_id'      => '',
              'menu_class'        => 'footer-menu-ul',
              'echo'              => true,
              'fallback_cb'       => 'wp_page_menu',
              'before'            => '',
              'after'             => '',
              'link_before'       => '',
              'link_after'        => '',
              'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'             => 3,
              'walker'            => '',
              'theme_location'    => 'footer_3' ,
              'menu_li_actived'       => 'current-menu-item',
              'menu_item_has_children'=> 'menu-item-has-children',
            );
            wp_nav_menu($args);
            ?>
          </div>
          <div class="footer-menu-box">
            <h3 class="footer-menu-h">Tư vấn</h3>
            <ul class="footer-menu-ul">
              <li><a href="javascript:void(0);">Tư vấn mua hàng (11:00 - 21:00)</a></li>
              <li><a href="tel:<?php echo get_field("setting_thong_tin_chung_call_now","option"); ?>"><?php echo get_field("setting_thong_tin_chung_hotline","option"); ?></a></li>
              <li><a href="javascript:void(0);">Góp ý, khiếu nại, bảo hành (11:00 - 21:00)</a></li>
              <li><a href="tel:<?php echo get_field("setting_thong_tin_chung_call_now","option"); ?>"><?php echo get_field("setting_thong_tin_chung_hotline","option"); ?></a></li>
              <li><a href="javascript:void(0);">Hợp tác kinh doanh (11:00 - 21:00)</a></li>
              <li><a href="tel:<?php echo get_field("setting_thong_tin_chung_call_now","option"); ?>"><?php echo get_field("setting_thong_tin_chung_hotline","option"); ?></a></li>
            </ul>
          </div>
          <div class="clr"></div>
        </div>
      </div>
      <div class="col-xl-2">
        <div class="footer-menu-group">
          <div class="footer-menu-box">
            <h3 class="footer-menu-h">Connect with us</h3>
            <ul class="iconsocialbg" itemscope itemtype="http://schema.org/Organization">
              <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_facebook","option"); ?>"><i class="fab fa-facebook-f"></i></a></li>
              <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_youtube","option"); ?>"><i class="fab fa-youtube"></i></a></li>
              <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_instagram","option"); ?>"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <div class="box-bo-cong-thuong">
              <img src="<?php echo get_template_directory_uri()."/assets/images/bo-cong-thuong.png"; ?>" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row box-copyright">
      <div class="col">
        <div class="box-blog-info">&copy;2018 <?php echo get_bloginfo( 'name', 'raw' ); ?> - Hàng Hiệu Nhập Khẩu Go . GPDKKD: 41O8036924 do sở KH & ĐT TP.HCM cấp ngày 21/08/2018.</div>
        <div class="box-copy-right-address">
          <span class="box-cpr-address-bold">Địa chỉ:</span> <span class="box-cpr-address-txt"><?php echo get_field("setting_thong_tin_chung_address","option"); ?></span> <span class="box-cpr-address-bold">Điện thoại:</span> <span class="box-cpr-link"><a href="tel:<?php echo get_field("setting_thong_tin_chung_call_now","option"); ?>"><?php echo get_field("setting_thong_tin_chung_hotline","option"); ?></a></span> . <span class="box-cpr-address-bold">Email:</span> <span class="box-cpr-link"><a href="mailto:<?php echo get_field("setting_thong_tin_chung_email","option"); ?>"><?php echo get_field("setting_thong_tin_chung_email","option"); ?></a></span>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- begin pan search -->
<div class="pan_search">
  <div class="pan_close">
   <a href="javascript:void(0);" onclick="closeFrmSearch();"><i class="fa fa-times" aria-hidden="true"></i></a>
 </div>
 <form class="frmsearcharticle" name="frm_search_article" method="POST">
  <div class="vatimkiem"><input value="" name="s" type="search" placeholder="Tìm kiếm" class="txt_search" autocomplete="off"></div>
  <div class="btnsearch">
    <a href="javascript:void(0);" onclick="document.forms['frm_search_article'].submit();"><img src="<?php echo get_template_directory_uri()."/assets/images/search-w.svg"; ?>" alt="<?php echo get_bloginfo( 'name','raw' ); ?>" /></a>
  </div>
</form>
</div>
<!-- end pan search -->
<!-- begin modal cart -->
<div class="modal fade modal-add-cart" id="modal-alert-add-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="com-product-modal-title">Thông báo</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
<!-- end modal cart -->
<!-- begin scrolltop -->
<div class="scrollTop">
  <a href="javascript:void(0);"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<!-- end scrolltop -->
<?php
wp_footer();
?>
</body>
</html>
