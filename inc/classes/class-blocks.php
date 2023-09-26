<?php
/**
 * Blocks
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Blocks {
	use Singleton;

	protected function __construct() {

		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_filter( 'block_categories_all', [ $this, 'add_block_categories' ] );
		add_action('init', [$this, 'register_block_pattern_assets'] );
	}

	/**
	 * Add a block category
	 *
	 * @param array $categories Block categories.
	 *
	 * @return array
	 */
	public function add_block_categories( $categories ) {

		$category_slugs = wp_list_pluck( $categories, 'slug' );

		return in_array( 'aquila', $category_slugs, true ) ? $categories : array_merge(
			$categories,
			[
				[
					'slug'  => 'aquila',
					'title' => __( 'Aquila Blocks', 'aquila' ),
					'icon'  => 'table-row-after',
				],
			]
		);

	}

	/**
	 * Register block pattern assets
	 */

	public function register_block_pattern_assets() {
		register_block_type (
			'aquila/hero',
			[
				'editor_script' => 'aquila-blocks-js',
				'editor_style' => 'aquila-blocks-css',
				'style' => 'aquila-blocks-css',
			]
		);
	}


}
