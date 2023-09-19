<?php
/**
 * Theme Functions
 * 
 * @package Aquila
 */

 
 if (!defined('AQUILA_DIR_PATH')){
     define('AQUILA_DIR_PATH', untrailingslashit(get_template_directory())); 
 }
 include_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

  // aquila_get_theme_instance() function for get_instance() method from class-aquila-theme.php
  function aquila_get_theme_instance(){
     \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
    }  

// setup theme Script
 function aquila_enqueue_scripts(){
    // register styles
    wp_register_style('stylesheet', get_stylesheet_uri(),[], filemtime(get_template_directory().'/style.css'), 'all');
    wp_register_style('bootstrap', get_template_directory_uri().'/assets/style/bootstrap.min.css', [], false, 'all');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('stylesheet');  

    // register scripts
    wp_register_script('main-js', get_template_directory_uri().'/assets/js/main.js', [], filemtime(get_template_directory().'/assets/js/main.js'), true);
    wp_register_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', ['jquery'], false, true);
    
    wp_enqueue_script('main-js');
    wp_enqueue_script('bootstrap-js');

  
 }

 add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');

 ?>
 