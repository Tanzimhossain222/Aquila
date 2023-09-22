<?php 

/**
 * Register Theme sidebars
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class SideBars {
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
       add_action('widgets_init', [$this, 'register_sidebars']);
    }

    /**
	 * Register widgets.
	 *
	 * @action widgets_init
	 */
    public function register_sidebars()
    {
        register_sidebar(
            [
                'name'          => __('Sidebar', 'aquila'),
                'id'            => 'sidebar-1',
                'description'   => __('Main Sidebar', 'aquila'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'

            ]
        );

        register_sidebar(
            [
                'name'          => __('Footer Sidebar', 'aquila'),
                'id'            => 'sidebar-2',
                'description'   => __('Footer Sidebar', 'aquila'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'

            ]
        );
    }  
}