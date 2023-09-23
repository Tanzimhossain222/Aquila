<?php 

/**
 * Enqueue theme assets
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

     /**
     #AQUILA_DIR_URI & AQUILA_DIR_PATH are defined in functions.php

     #filemtime() is used to get the last modified time of the file.
     */

    public function register_styles()
    {
        // Register styles
        wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap', AQUILA_DIR_URI . '/assets/src/lib/bootstrap.min.css', [], false, 'all');
        wp_register_style('fonts-css', AQUILA_DIR_URI . '/assets/src/lib/fonts/fonts.css', [], filemtime(AQUILA_DIR_PATH . '/assets/src/lib/fonts/fonts.css'), 'all');

        wp_register_style('main-css', AQUILA_BUILD_CSS_URI . '/main.css', ['bootstrap'], filemtime(AQUILA_BUILD_CSS_DIR_PATH . '/main.css'), 'all');
        

        wp_enqueue_style('bootstrap');
        wp_enqueue_style('stylesheet');
        wp_enqueue_style('main-css');
        wp_enqueue_style('fonts-css');
    }

    public function register_scripts()
    {
        // Register scripts 
        wp_register_script('main-js', AQUILA_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(AQUILA_BUILD_JS_DIR_PATH. '/main.js'), true); 

        wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/lib/bootstrap.min.js', ['jquery'], '5.0.0', true);

        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}