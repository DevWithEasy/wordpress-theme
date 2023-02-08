<?php

//Theme title for site
add_theme_support('title-tag');


//Theme CSS and jQuary file calling

function devblog_css_js_calling(){
    //CSS file
    wp_enqueue_style('dev-blog-css', get_stylesheet_uri());
    wp_register_style( 'bootstrap', get_template_directory_uri().'./css/bootstrap.min.css', array(), '5.3.0', 'all' );
    wp_register_style( 'main', get_template_directory_uri().'./css/main.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('main');

    //jQuary file
    wp_enqueue_script('jquery');

    //JS file
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'./js/bootstrap.min.js', array(),'5.3.0', 'true' );
    wp_enqueue_script( 'main', get_template_directory_uri().'./js/main.js', array(),'1.0.0', 'true' );
}

add_action('wp_enqueue_scripts','devblog_css_js_calling');

//Theme function
function devblog_customizar_register($wp_customize){
    $wp_customize->add_section('devblog-header-area',array(
        'title'=>__('Header Area', 'devblogtheme'),
        'description' => 'Change Header Image'
    ));

    $wp_customize->add_setting('devblog_logo',array(
        'default' =>get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'devblog_logo',array(
        'label' => 'Logo upload',
        'setting' => 'devblog_logo',
        'section' => 'devblog-header-area'
    )));
}

add_action('customize_register','devblog_customizar_register')
?>