<?php 

/**
 *  Blocks Class
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class Blocks {
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
       add_action('block_categories', [$this, 'add_block_categories']);
    }

    /**
     * Add custom block categories
     *
     * @param [type] $categories
     * @return void
     * @link https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
     */
     public function add_block_categories($categories){
        $category_slugs = wp_list_pluck($categories, 'slug');

        return in_array('aquila', $category_slugs, true) ? $categories : array_merge(
            $categories,
            [
                [
                    'slug' => 'aquila',
                    'title' => __('Aquila Blocks', 'aquila'),
                    'icon' => 'table-row-after'
                ]
            ]
        );

     }
}