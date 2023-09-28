<?php

/**
 * Register Custom Texonomies for Movie
 *
 * @package Aquila
 * 
 * https://www.wp-hasty.com/tools/wordpress-taxonomy-generator/
 */

 namespace AQUILA_THEME\Inc;

 use AQUILA_THEME\Inc\Traits\Singleton;

class Register_Taxonomies
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('init', [$this, 'create_genra_taxonomy'], 0);
        add_action( 'init', [$this, 'create_year_taxonomy'] );
    }

    // Register Taxonomy Genra
    public function create_genra_taxonomy(){

        $labels = [
            'name'              => _x('Genras', 'taxonomy general name', 'aquila'),
            'singular_name'     => _x('Genra', 'taxonomy singular name', 'aquila'),
            'search_items'      => __('Search Genras', 'aquila'),
            'all_items'         => __('All Genras', 'aquila'),
            'parent_item'       => __('Parent Genra', 'aquila'),
            'parent_item_colon' => __('Parent Genra:', 'aquila'),
            'edit_item'         => __('Edit Genra', 'aquila'),
            'update_item'       => __('Update Genra', 'aquila'),
            'add_new_item'      => __('Add New Genra', 'aquila'),
            'new_item_name'     => __('New Genra Name', 'aquila'),
            'menu_name'         => __('Genra', 'aquila'),
        ];
        $args = [
            'labels' => $labels,
            'description' => __('Movie Genra ', 'aquila'),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        ];

        register_taxonomy('genra', ['movies'] , $args);
    }


    // Register Taxonomy Year
function create_year_taxonomy() {

	$labels = array(
		'name'              => _x( 'Years', 'taxonomy general name', 'aquila' ),
		'singular_name'     => _x( 'Year', 'taxonomy singular name', 'aquila' ),
		'search_items'      => __( 'Search Years', 'aquila' ),
		'all_items'         => __( 'All Years', 'aquila' ),
		'parent_item'       => __( 'Parent Year', 'aquila' ),
		'parent_item_colon' => __( 'Parent Year:', 'aquila' ),
		'edit_item'         => __( 'Edit Year', 'aquila' ),
		'update_item'       => __( 'Update Year', 'aquila' ),
		'add_new_item'      => __( 'Add New Year', 'aquila' ),
		'new_item_name'     => __( 'New Year Name', 'aquila' ),
		'menu_name'         => __( 'Year', 'aquila' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Movie Release Year', 'aquila' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'movie-year', array('movies'), $args );

}



}
