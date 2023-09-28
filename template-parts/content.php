<?php 
/**
 * Content  template
 * 
 * @package Aquila
 */

 $container_class = !empty($args['container_class']) ? $args['container_class'] : 'mb-5';   //This is comes from archive.php
?>


<article id="post-<?php the_ID() ?>"  <?php post_class( $container_class); ?> >

<?php 
    get_template_part('template-parts/components/blog/entry-header');
    get_template_part('template-parts/components/blog/entry-meta');
    get_template_part('template-parts/components/blog/entry-content');
    get_template_part('template-parts/components/blog/entry-footer');
?>
</article>