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
        if(is_single()){
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
            
        } else{
            aquila_the_excerpt(200);
           echo aquila_excerpt_more();

        }

        
    ?>
</div>
