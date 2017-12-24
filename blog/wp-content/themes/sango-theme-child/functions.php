<?php

//子テーマのCSSの読み込み
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'child-style', 
  	get_stylesheet_directory_uri() . '/style.css', 
  	array('sng-stylesheet','sng-option')
	);
    //jsの読み込み
  wp_enqueue_script( 'sng-js', 
        get_stylesheet_directory_uri() . '/scripts.js', 
        array(), '', true );
}

?>