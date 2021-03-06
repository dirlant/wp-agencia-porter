<?php

// Archivos requeridos * esta clase imprime el menu dropdown
require_once('wp_bootstrap_navwalker.php');

show_admin_bar(true);


// Menus del tema
add_action( 'init', 'ap_arose_menus' );

function ap_arose_menus(){
  register_nav_menus( $locations = array(
    'menu-principal' => __('Menu Principal', 'ap_arose'),
    'menu-social' => __('Menu Redes Sociales', 'ap_arose')

  ));
}

//Configuracion del tema
add_action( 'after_setup_theme', 'ap_arose_setup');

function ap_arose_setup(){
  add_theme_support( 'post-thumbnails' );
}


// Post custom field, para que aparezca en el menu de wordpress
add_action( 'init', 'ap_arose_portafolio' );

function ap_arose_portafolio() {

  $labels = array(
		'name'               => _x( 'Portafolio', 'ap_arose' ),
		'singular_name'      => _x( 'Portafolio', 'post type singular name', 'ap_arose' ),
		'menu_name'          => _x( 'Portafolio', 'admin menu', 'ap_arose' ),
		'name_admin_bar'     => _x( 'Portafolio', 'add new on admin bar', 'ap_arose' ),
		'add_new'            => _x( 'Añadir nuevo', 'book', 'ap_arose' ),
		'add_new_item'       => __( 'Añadir nuevo', 'ap_arose' ),
		'new_item'           => __( 'Nuevo Portafolio', 'ap_arose' ),
		'edit_item'          => __( 'Editar Portafolio', 'ap_arose' ),
		'view_item'          => __( 'Ver Portafolio', 'ap_arose' ),
		'all_items'          => __( 'Todos', 'ap_arose' ),
		'search_items'       => __( 'Buscar Portafolio', 'ap_arose' ),
		'parent_item_colon'  => __( 'Parent Portafolio:', 'ap_arose' ),
		'not_found'          => __( 'No Portafolio found.', 'ap_arose' ),
		'not_found_in_trash' => __( 'No Portafolio found in Trash.', 'ap_arose' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'Portfolio de la agencia' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats', 'page-attributes' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'portfolio', $args );
}

if (function_exists('acf_add_options_page')) {

  $parent = acf_add_options_page(array(
    'page_title' => 'Configuraciones Generales',
    'menu_title' => 'General',
    'menu_slug' => 'general',
    'capability' => 'edit_posts',
    'position' => false,
    'icon_url' => false,
    'redirect' => false
  ));

}


?>
