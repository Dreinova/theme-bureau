<?php

function myPostTypes(){
    create_post_types('Banners Principales', 'Banners', 'dashicons-slides', 'banners-bureau');
    create_post_types('¿Por qué Bogotá?', 'Por qué Bogotá', 'dashicons-media-spreadsheet', 'porque-bureau');
    create_post_types('Eventos en Bogotá', 'Eventos', 'dashicons-calendar-alt', 'eventos-bureau');

    // Crear submenus como post types secundarios
    // create_post_types('Atributos Servicio', 'Atributo Servicio', 'dashicons-tag', 'atserv-bcct', true, false);
}

function create_post_types($name, $singularName, $icon, $slug, $showUI = true, $show_in_menu = true)
{
    register_post_type($slug, array(
        'exclude_from_search' => true,
        'has_archive' => false,
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'rest_base' => $slug,
        'labels' => array(
            'name' => ($name),
            'singular_name' => ($singularName),
            'add_new' => ('Agregar ' . $singularName),
            'add_new_item' => ('Agregar ' . $singularName),
            'edit_item' => ('Editar ' . $singularName),
            'new_item' => ('Agregar ' . $singularName),
            'view_item' => ('Ver ' . $singularName),
            'not_found' => ('No se encontraron ' . $name)
        ),
        'menu_icon' => $icon,
        'public' => true,
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'hierarchical' => false,
        'show_ui' => $showUI,
        'show_in_menu' => $show_in_menu,
        'capability_type' => 'post',
        'rewrite' => array('slug' => $slug),
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
    ));
}

// Agregar los submenús debajo de los CPTs principales
function add_custom_submenus()
{
    // add_submenu_page(
    //     'edit.php?post_type=services', // Parent: Servicios
    //     'Atributos Servicio', // Título de página
    //     'Atributos Servicio', // Título del menú
    //     'manage_options',
    //     'edit.php?post_type=atserv-bcct' // Slug del post type
    // );
}

add_action('init', 'myPostTypes');
add_action('admin_menu', 'add_custom_submenus');
