<?php

/**
 * Template for displaying search forms in aqula
 * 
 * @package WordPress
 * 
 */
?>

<form class="d-flex" method="get" action="<?php echo esc_url( home_url( '/' )); ?>" role="search" >
<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'aquila' ); ?></span>
    <input class="form-control me-2" type="search" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'aquila' ); ?>" aria-label="Search" value="<?php echo get_search_query(); ?>" name="s">
    <button class="btn btn-outline-success" type="submit"   value="<?php echo esc_attr_x( 'Search', 'submit button','aquila' ); ?>">Search</button>
</form>