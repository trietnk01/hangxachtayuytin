<?php

// Load css

add_action('wp_enqueue_scripts','p_load_css_js');

if(!function_exists('p_load_css_js')){

    function p_load_css_js(){
        global $wp_scripts;
        $js_css_ran = rand(1000,100000);
        wp_enqueue_style('stylemincss',get_template_directory_uri() . '/assets/css/style-dienkim.min.css',array(),@$js_css_ran,'all');
        wp_enqueue_script('styleminjs',get_template_directory_uri() . '/assets/js/style-dienkim.min.js',array('jquery'),@$js_css_ran,true);
    }

}