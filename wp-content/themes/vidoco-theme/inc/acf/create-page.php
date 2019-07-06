<?php
/*
	acf create page
*/
if( ! class_exists('ACF') ) return;

//if ( p_get_current_user_role() == "subscriber" ) return;

// create page

acf_add_options_page(array(
	'page_title' 	=> 'PAGE Option',
	'menu_title'	=> 'PAGE Option',
	'menu_slug' 	=> 'p_option_page',
	'capability'	=> 'edit_posts',
	'redirect'		=> admin_url('admin.php?page=page_option') ,
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Cấu hình',
	'menu_title'	=> 'Cấu hình',
	'menu_slug' 	=> 'page_option',
	'parent_slug'	=> 'p_option_page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Trang chủ',
	'menu_title'	=> 'Trang chủ',
	'menu_slug' 	=> 'home_page',
	'parent_slug'	=> 'p_option_page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Trang con',
	'menu_title'	=> 'Trang con',
	'menu_slug' 	=> 'p_option_child_page',
	'parent_slug'	=> 'p_option_page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Thông tin các tab chi tiết sản phẩm',
	'menu_title'	=> 'Thông tin các tab chi tiết sản phẩm',
	'menu_slug' 	=> 'p_option_zaproduct_tabs',
	'parent_slug'	=> 'p_option_page',
));