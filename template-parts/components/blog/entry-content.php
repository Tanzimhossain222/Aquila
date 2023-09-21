<?php

/**
 * Template part for displaying post entry content
 * 
 * To be used inside WordPress The Loop
 * 
 * @package Aquila
 */
?>



<div class="entry-content">
    <?php
    if (is_single()) {
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'aqula'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            )
        );
        
// This  wp_link_pages() function is used to display pagination links for multi-page posts.
    wp_link_pages(
        [
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'aqula'),
            'after' => '</div>',
        ]
    ); 

    } else {
        aquila_the_excerpt(200);
        echo aquila_excerpt_more();
    }
    ?>
</div>