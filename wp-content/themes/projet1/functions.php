<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

add_theme_support( 'menus' );


// enlever la barre d'administration worpress
add_filter('show_admin_bar', '__return_false');


// support des SVG
//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg';
	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types; 
} 
add_action('upload_mimes', 'add_file_types_to_uploads');

function gym_register_assets() {

	// Déclarer jQuery
	wp_deregister_script( 'jquery' ); // On annule l'inscription du jQuery de WP
	wp_enqueue_script( // On déclare une version plus moderne
		'jquery', 
		'https://code.jquery.com/jquery-3.6.0.min.js', 
		false, 
		'3.6.0', 
		true 
	);
	
	// déclarer swiper JS
	wp_enqueue_script( 
		'swiper JS js', 
		'https://unpkg.com/swiper/swiper-bundle.min.js', 
		array(), 
		'1.0', 
		true
	);

	wp_enqueue_style( 
		'swiper JS css',
		'https://unpkg.com/swiper/swiper-bundle.min.css', 
		array(), 
		'1.0'
	);
	
	// Déclarer le JS
	wp_enqueue_script( 
		'GBLF js', 
		get_template_directory_uri() . '/js/script.js', 
		[], 
		'1.0', 
		true
	);

	
    // Déclarer style.css à la racine du thème
    wp_enqueue_style( 
		'GBLF css',
        get_stylesheet_uri(), 
        array(), 
        '1.0'
    );
	
    // Déclarer le fichier CSS
    wp_enqueue_style( 
		'GBLF main', 
        get_template_directory_uri() . '/css/main.css',
        array(), 
		time()
    );
	
};
add_action( 'wp_enqueue_scripts', 'gym_register_assets' );

//option page header et footer
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'menu_slug' 	=> 'header',
        'position' => 4,
        'icon_url' => 'dashicons-upload',
		'redirect'		=> false
	));
   
}




//fonction de création de mon CPT
function destinations_post_types() {
	
    // CPT demande
    $labels = array(
        'name' => 'destination',
        'all_items' => 'toutes les destinations',
        'singular_name' => 'Destination',
        'add_new_item' => 'Introduire une destination',
        'edit_item' => 'Modifier une destination',
        'menu_name' => 'destination'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-list-view',
		// 'supports' => array('author'),
	);

	register_post_type( 'destination', $args );
}
add_action( 'init', 'destinations_post_types' ); // Le hook init lance la fonction





add_image_size( 'fullpage', 2560, 800, true );
  