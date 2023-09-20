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
        wp_register_style('bootstrap', AQUILA_DIR_URI . '/assets/style/bootstrap.min.css', [], false, 'all');

        wp_enqueue_style('bootstrap');
        wp_enqueue_style('stylesheet');
    }

    public function register_scripts()
    {
        // Register scripts
        wp_register_script('main-js', AQUILA_DIR_URI . '/assets/js/main.js', [], filemtime(AQUILA_DIR_PATH . '/assets/js/main.js'), true);

        wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/js/bootstrap.min.js', ['jquery'], false, true);

        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}