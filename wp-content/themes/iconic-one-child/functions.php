<?php
/**
 * Created by PhpStorm.
 * User: derektu
 * Date: 4/17/15
 * Time: 4:23 PM
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

function custom_excerpt_length( $length ) {
    return 150;
}

add_filter( 'excerpt_length', 'custom_excerpt_length' );


/**
 * Add site-specific Open Graph protocol customizations to the Facebook plugin
 *
 * @param array $meta_tags an associative array of Open Graph protocol properties with keys expressed as full IRIs
 * @return array plugin default values with site-specific customizations
 */
function my_ogp_filter( $meta_tags ) {
    $meta_tags['http://ogp.me/ns#image'][] = array(
        'url' => 'http://s.wordpress.org/about/images/logos/wordpress-logo-notext-rgb.png',
        'type' => 'image/png',
        'width' => 500,
        'height' => 500
    );
    return $meta_tags;
}
add_filter( 'fb_meta_tags', 'my_ogp_filter' );
