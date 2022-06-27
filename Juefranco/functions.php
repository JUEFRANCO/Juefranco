<?php

function init_template(){
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	
	register_nav_menus(
	array(
		'top_menu' =>'Menu Principal'
		)
	);
}

add_action('after_setup_theme','init_template');

function assests(){
	wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css','','5.2.0','all');
	wp_register_style('montserrat','https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,300&display=swap','','1.0','all');
	
	wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0','all');
	
	wp_register_script('poppper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js','','2.11.5',true);
	wp_enqueue_script('bootstraps','https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-      
	beta1/dist/js/bootstrap.min.js',array('jquery','popper'),'4.4.1',true);
	
	wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js','','1.0', true);
}

add_action('wp_enqueue_scripts','assests');

function sidebar(){
 register_sidebar(
 array(
 'name' => 'Pie de página',
	 'id' => 'footer',
	 'description' => 'Zona de Widgets para pie de página',
	 'before_tittle' => '<p>',
	 'after_title' => '</p>',
	 'before_widget' => '<div id="%1$s" class="%2$s">',
	 'after:widget' => '</div>',
 )
 );
}

add_action('widgets_init', 'sidebar');