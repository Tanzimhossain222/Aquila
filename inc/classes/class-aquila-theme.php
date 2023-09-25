<?php

/**
 * Bootstrap the Theme.
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
{
    use Singleton;

    protected function __construct()
    {
        // load class
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        Blocks::get_instance();
        Block_Patterns::get_instance();



        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions
         */

        add_action('after_setup_theme', [$this, 'setup_theme']);

    }

    public function setup_theme()
    {
        add_theme_support('title-tag');

        add_theme_support( 'custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ] );


        $defaults = [
            'default-color'          => '',
            'default-image'          => '',
            'default-repeat'         => 'no-repeat',
            'default-position-x'     => 'left',
                'default-position-y'     => 'top',
                'default-size'           => 'auto',
            'default-attachment'     => 'scroll',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        ];
        add_theme_support( 'custom-background', $defaults );
        add_theme_support('post-thumbnails');
        add_image_size( 'featured-thumbnail', 300, 200, true );
        add_theme_support( 'customize-selective-refresh-widgets' ); 
        add_theme_support( 'automatic-feed-links' ); 
        add_theme_support( 'html5', 
            [
                'comment-list',
                'comment-form',
                'search-form',
                'gallery',
                'caption',
                'script',
                'style',
            ] 
        ); 

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'align-wide' ); 


        /**
		 * Loads the editor styles in the Gutenberg editor.
		 *
		 * Editor Styles allow you to provide the CSS used by WordPress’ Visual Editor so that it can match the frontend styling.
		 * If we don't add this, the editor styles will only load in the classic editor ( tiny mice )
		 *
		 * @see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
		 */
        add_theme_support( 'editor-styles');


        /**
		 *
		 * Path to our custom editor style.
		 * It allows you to link a custom stylesheet file to the TinyMCE editor within the post edit screen.
		 *
		 * Since we are not passing any parameter to the function,
		 * it will by default, link the editor-style.css file located directly under the current theme directory.
		 * In our case since we are passing 'assets/dist/css/editor.css' path it will use that.
		 * You can change the name of the file or path and replace the path here.
		 *
		 * @see add_editor_style(
		 * @link https://developer.wordpress.org/reference/functions/add_editor_style/
		 */
        add_editor_style('assets/dist/css/editor.css');

        //Remove the core block patterns
        remove_theme_support( 'core-block-patterns' );



        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 1240;
        }

        
    }

   
}
