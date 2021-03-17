<?php
require_once('example.php');

//fonction qui recupere les script
function wild_life_scripts() {

	wp_deregister_script('jquery');//pour ne pas charger la version jquery de wordpress.

	wp_enqueue_script('jquery-min', get_template_directory_uri(). '/js/jquery.min.js', array(), false, false);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri(). '/js/bootstrap.js', array(), false, false);
	wp_enqueue_script('lightbox-plus-jquery-min', get_template_directory_uri(). '/js/lightbox-plus-jquery.min.js', array(), false, true);
	
	wp_enqueue_script('Script-theme', get_template_directory_uri(). '/js/theme.js', array(), false, true);
}

//ajout des script 'wp_enqueue_scripts'
add_action('wp_enqueue_scripts', 'wild_life_scripts');

//fonction qui recupere les css
function wild_life_styles() {

	wp_enqueue_style('bootstrap-css', get_template_directory_uri(). '/css/bootstrap.css', array(), null);
	wp_enqueue_style('lightbox-css', get_template_directory_uri(). '/css/lightbox.css', array(), null);
	wp_enqueue_style('fontawesome-css', 'https://use.fontawesome.com/releases/v5.15.2/css/all.css', array(), null);
	wp_enqueue_style('styles-css', get_template_directory_uri(). '/css/styles.css', array(), null);
}

//ajout des css 'wp_enqueue_scripts'
add_action('wp_enqueue_scripts', 'wild_life_styles');

//ajout d'un menu personnalisable
register_nav_menus(
	array(
		'header' => __('Menu principal', 'dwwm')
	)
);

//activer la possibilité d'une image de mise en avant (thumbnails) et du title-tag
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

//MODULE ACF
	//activer les option de page
	if( function_exists('acf_add_options_page') ) {
   
	    acf_add_options_page(array(
	        'page_title'     => 'Configurateur de thème',
	        'menu_title'    => 'Configurateur de thème',
	        'menu_slug'     => 'config-theme',
	        'capability'    => 'edit_posts', //grade de wordpress
	        'redirect'        => true
	    ));
	   
	    acf_add_options_sub_page(array(
	        'page_title'     => 'Coordonnées',
	        'menu_title'    => 'Coordonnées',
	        'parent_slug'    => 'config-theme',
	    ));

	    acf_add_options_sub_page(array(
	        'page_title'     => 'Page 404',
	        'menu_title'    => 'Page 404',
	        'parent_slug'    => 'config-theme',
	    ));
	}
//creation d'une fonction pour surcharger la longeur de base des excerpt dans wordpress
function new_excerpt_length() {
	return 25;
}
//on remplace la fonction d'origine (excerpt_length) par la notre.
add_filter('excerpt_length', 'new_excerpt_length');

//Ajout d'une filtre pour enlever les balise <span> entourant les input dans ContactFrom7
add_filter('wpcf7_form_elements', function( $content ) {
  $dom = new DOMDocument();
  $dom->preserveWhiteSpace = false;
  $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

  $xpath = new DomXPath($dom);
  $spans = $xpath->query("//span[contains(@class, 'wpcf7-form-control-wrap')]" );

  foreach ( $spans as $span ) :
    $children = $span->firstChild;
    $span->parentNode->replaceChild( $children, $span );
  endforeach;

  return $dom->saveHTML();
});

/**
 * Dropdown. (walker)
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );