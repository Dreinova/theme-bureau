<?php

/*
@package gamedugg
========================
ADMIN EQUEUE FUNCTIONS
========================
*/

function gamedugg_admin_scripts($hook)
{

    wp_register_style('gamedugg_admin', get_template_directory_uri() . '/css/gamedugg.admin.css', array(), '1.0.8', 'all');
    wp_enqueue_style('gamedugg_admin');

    wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'gamedugg_admin_scripts');

/*

========================
FRONT-END EQUEUE FUNCTIONS
========================
*/

function gamedugg_load_scripts()
{

    wp_register_script('front_script', get_template_directory_uri() . '/js/custom.js', array(), '1.0.2', true);
    wp_enqueue_script('front_script');
}

add_action('wp_enqueue_scripts', 'gamedugg_load_scripts');

function bureau_enqueue_styles() {
    // Google Fonts
    wp_enqueue_style(
        'bureau-google-fonts',
        'https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap',
        false
    );

    // Estilos del tema
    wp_enqueue_style(
        'bureau-style',
        get_stylesheet_uri(),
        array('bureau-google-fonts'),
        filemtime(get_template_directory() . '/style.css')
    );
}
add_action('wp_enqueue_scripts', 'bureau_enqueue_styles');
