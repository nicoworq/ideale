<?php


// Register Custom Post Type
function custom_post_type_propiedades() {

    $labels = array(
        'name' => _x('Propiedades', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Propiedad', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Propiedades', 'text_domain'),
        'name_admin_bar' => __('Propiedades', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('Todas las Propiedades', 'text_domain'),
        'add_new_item' => __('Agregar Propiedad', 'text_domain'),
        'add_new' => __('Agregar nueva', 'text_domain'),
        'new_item' => __('Nueva propiedad', 'text_domain'),
        'edit_item' => __('Editar propiedad', 'text_domain'),
        'update_item' => __('Actualizar propiedad', 'text_domain'),
        'view_item' => __('Ver propiedad', 'text_domain'),
        'search_items' => __('Buscar propiedad', 'text_domain'),
        'not_found' => __('No encontrada', 'text_domain'),
        'not_found_in_trash' => __('No encontrada en Papelera', 'text_domain'),
    );
    $args = array(
        'label' => __('Propiedad', 'text_domain'),
        'description' => __('Propiedades Xion', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields',),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-home',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('propiedad', $args);
}

add_action('init', 'custom_post_type_propiedades', 0);