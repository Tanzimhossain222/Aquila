<?php 

/**
 * Register custom block patterns
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class Block_Patterns {
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }
    
    protected function setup_hooks()
    {
        add_action('init', [$this, 'register_block_patterns']);
        add_action('init', [$this, 'register_block_patterns_categories']);

    }

    /**
     * Register block patterns
     * 
     * @return void
     * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
     */

    function register_block_patterns()
    {
        if(function_exists('register_block_pattern')){
            register_block_pattern(
                'aquila/cover',
                [
                    'title' => __('Aquila Cover', 'aquila'),
                    'description' => __('Aquila Cover block pattern', 'aquila'),
                    'categories' => ['cover'],
                    'content'=> '<!-- wp:cover {"url":"http://localhost/wordpress/wp-content/uploads/2008/06/windmill.jpg","id":767,"dimRatio":50,"layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-767" alt="Windmill" src="http://localhost/wordpress/wp-content/uploads/2008/06/windmill.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"aquila-cover"} -->
                    <h2 class="wp-block-heading has-text-align-center aquila-cover">Never let your memories be greater than<br>your dreams</h2>
                    <!-- /wp:heading -->
                    
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center">A mind that is stretched by a new experience can never go back to its old<br>dimensions.</p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textColor":"cyan-bluish-gray","style":{"color":{"gradient":"linear-gradient(135deg,rgb(6,147,227) 0%,rgb(155,81,224) 87%)"}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link has-cyan-bluish-gray-color has-text-color has-background wp-element-button" style="background:linear-gradient(135deg,rgb(6,147,227) 0%,rgb(155,81,224) 87%)"><strong>Learn More</strong></a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div></div>
                    <!-- /wp:cover -->'
                ]
            );
        }
        
    }


    /**
     * block patterns categories register function
     * 
     * @return void
     * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
     */

    function register_block_patterns_categories(){
        $pattern_categories = [
            'cover' => __('Cover', 'aquila'),
            'carousel' => __('Carousel', 'aquila'),
        ];
        if(function_exists('register_block_pattern_category') && !empty($pattern_categories)){
            foreach($pattern_categories as $pattern_category => $pattern_category_label){
                register_block_pattern_category($pattern_category, ['label' => $pattern_category_label]);
            }
        }
    }
}

