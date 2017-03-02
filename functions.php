<?php

/* Do not remove this line. */
require_once('includes/tweek.php');


/*
** ACF GOOGLE MAPS API KEY SUPPORT
*/
// You can move this to your wp-config.php
define('GOOGLE_MAPS_API_KEY', 'XxXyourGoogleMapsAPIkeyhereXxX');

function tweek_acf_google_map_api() {
  acf_update_setting('google_api_key', GOOGLE_MAPS_API_KEY);
}
add_action('acf/init', 'tweek_acf_google_map_api');

// Use the filter below instead if you're using the non-Pro version of ACF

/*function tweek_acf_google_map_api( $api ) {
  $api['key'] = GOOGLE_MAPS_API_KEY;
  return $api;
}
add_filter('acf/fields/google_map/api', 'tweek_acf_google_map_api');*/







/*
 * tweek_meta() adds all meta information to the <head> element for us.
 */

function tweek_meta() { ?>

  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->

<?php }

add_action('wp_head', 'tweek_meta');

/* Theme CSS */

function theme_styles() {

  wp_register_style( 'tweek-main', get_template_directory_uri() . '/assets/css/master.css', false, filemtime(dirname(__FILE__) . '/assets/css/master.css') );
  wp_enqueue_style( 'tweek-main' );

  wp_register_style( 'tweek-custom', get_template_directory_uri() . '/custom.css', false, filemtime(dirname(__FILE__) . '/custom.css') );
  wp_enqueue_style( 'tweek-custom' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

/* Theme JavaScript */

function theme_js() {

  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.8.3.min.js', false, false, false );

  wp_register_script( 'tweek-main-concat', get_template_directory_uri() . '/assets/js/concat/main.js', array('jquery'), filemtime(dirname(__FILE__) . '/assets/js/concat/main.js'), true );

  wp_register_script( 'tweek-main-min', get_template_directory_uri() . '/assets/js/compiled/main.min.js', array('jquery'), filemtime(dirname(__FILE__) . '/assets/js/compiled/main.min.js'), true );

  /* FOR DEVELOPMENT */
  wp_enqueue_script( 'tweek-main-concat' );

  /* FOR PRODUCTION */
  /*wp_enqueue_script( 'tweek-main-min' );*/

}

add_action( 'wp_enqueue_scripts', 'theme_js' );

/* Enable ACF Options Pages */

if(function_exists('acf_add_options_page')) {

  acf_add_options_page();
  acf_add_options_sub_page('Header');
  acf_add_options_sub_page('Sidebar');
  acf_add_options_sub_page('Footer');

}

/* Enable Featured Image */

add_theme_support( 'post-thumbnails' );

/* Enable Custom Menus */

add_theme_support( 'menus' );

register_nav_menus(
  array(
    'tweek-main-nav' => __( 'Main Nav', 'tweek' )   // main nav in header
  )
);

function tweek_main_nav() {
  // display the wp3 menu if available
  wp_nav_menu(array(
    'container' => false, // remove nav container
    'container_class' => '', // class of container (should you choose to use it)
    'menu' => __( 'Main Nav', 'tweek' ), // nav name
    'menu_class' => 'main-nav', // adding custom nav class
    'theme_location' => 'tweek-main-nav', // where it's located in the theme
    'before' => '', // before the menu
    'after' => '', // after the menu
    'link_before' => '', // before each link
    'link_after' => '', // after each link
    'depth' => 0    // fallback function
  ));
} /* end tweek main nav */

function tweek_login_stylesheet() { ?>
  <link rel="stylesheet"
        id="custom_wp_admin_css"
        href="<?php echo get_template_directory_uri() . '/assets/css/login.css?ver=' . filemtime(dirname(__FILE__) . '/assets/css/login.css'); ?>"
        type="text/css"
        media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'tweek_login_stylesheet' );

function tweek_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'tweek_login_logo_url' );

function tweek_login_logo_url_title() {
  return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'tweek_login_logo_url_title' );









/* Place custom functions below here. */

/* Don't delete this closing tag. */
?>
