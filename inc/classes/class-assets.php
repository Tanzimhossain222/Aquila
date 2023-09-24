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
        add_action( 'enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );
    }

     /**
     #AQUILA_DIR_URI & AQUILA_DIR_PATH are defined in functions.php

     #filemtime() is used to get the last modified time of the file.
     */

    public function register_styles()
    {
        // Register styles
        wp_register_style('bootstrap', AQUILA_DIR_URI . '/assets/src/lib/bootstrap.min.css', [], false, 'all');
        wp_register_style('main-css', AQUILA_BUILD_CSS_URI . '/main.css', ['bootstrap'], filemtime(AQUILA_BUILD_CSS_DIR_PATH . '/main.css'), 'all');
        
        wp_enqueue_style('bootstrap');
        wp_enqueue_style('main-css');
    }

    public function register_scripts()
    {
        // Register scripts 
        wp_register_script('main-js', AQUILA_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(AQUILA_BUILD_JS_DIR_PATH. '/main.js'), true); 

        wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/lib/bootstrap.min.js', ['jquery'], '5.0.0', true);

        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }

    public function enqueue_editor_assets (){
        $asset_config_file = sprintf('%s/assets.php', AQUILA_BUILD_PATH);
        if(!file_exists($asset_config_file)){
            return;
        }

        $asset_config = require_once $asset_config_file;

        if(empty($asset_config['js/editor.js'])){
            return;
        } 

        $editor_asset = $asset_config['js/editor.js'];

        $js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
        $version = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : filemtime( $asset_config_file );

        // Theme Gutenberg block JS
        if(is_admin()){
            wp_enqueue_script(
                'aquila-blocks-js',
                AQUILA_BUILD_JS_URI . '/blocks.js',
                $js_dependencies,
                $version,
                true
            );
        }

        // Theme Gutenberg block CSS
        $css_dependencies = [
            'wp-block-library-theme',
            'wp-block-library'
        ];

        wp_enqueue_style(
            'aquila-blocks-css',
            AQUILA_BUILD_CSS_URI . '/blocks.css',
            $css_dependencies,
            filemtime( AQUILA_BUILD_CSS_DIR_PATH . '/blocks.css' ),
            'all'
        );
    }
}