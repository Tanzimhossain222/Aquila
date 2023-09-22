<?php 
/**
 * Template part for displaying post entry footer
 * 
 * To be used inside WordPress The Loop
 * 
 * @package Aquila
 */

$the_post_id = get_the_ID();
$article_terms = wp_get_post_terms($the_post_id, ['category', 'post_tag']);

// check if the article has any tags or categories. If not, then return nothing.
if (empty($article_terms) || !is_array($article_terms)) {
    return;
}  
?>


<?php 
/**
   This  is used for displaying post tags and categories. When you click on the tag or category, it will take you to the page where all the posts with that tag or category are displayed.
 */
?>
<div class="entry-footer mt-4">
    <?php 
    foreach ($article_terms as $key => $article_term) {
        ?>
        <button class="btn border border-secondary mb-2 mr-2">
            <a class="text-secondary " href="<?php echo esc_url(get_term_link($article_term)); ?>">
                <?php echo esc_html($article_term->name); ?>
            </a>
        </button>
        <?php
    }
    ?>
</div> 