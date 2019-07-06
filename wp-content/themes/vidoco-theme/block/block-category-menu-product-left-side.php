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
    'after'             => '',
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