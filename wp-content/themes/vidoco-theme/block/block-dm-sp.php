<h2 class="giam-gia-dac-biet">Danh mục sản phẩm</h2>
<form class="doreco-product-detail" name="doreco_product_detail" method="POST">
    <?php
    $args = array(
        'menu'              => '',
        'container'         => '',
        'container_class'   => '',
        'container_id'      => '',
        'menu_class'        => 'main-category',
        'echo'              => true,
        'fallback_cb'       => 'wp_page_menu',
        'before'            => '',
        'after'             => '<button type="button" class="toggle_r"  onclick="showDanhMucSanPhamChiTiet(this);"><i class="fas fa-plus"></i></button>',
        'link_before'       => '',
        'link_after'        => '',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'             => 3,
        'walker'            => '',
        'theme_location'    => 'dm_menu_san_pham' ,
        'menu_li_actived'       => 'current-menu-item',
        'menu_item_has_children'=> 'menu-item-has-children',
    );
    wp_nav_menu($args);
    ?>
</form>