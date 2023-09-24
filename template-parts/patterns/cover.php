<?php
/**
 * Cover Pattern template
 *
 * @package Aquila
 */
?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:cover {"url":"<?php echo esc_url(AQUILA_BUILD_IMG_URI . '/patterns/cover.jpg'); ?>","id":767,"dimRatio":50,"align":"full","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
        <img class="wp-block-cover__image-background wp-image-767" alt="Windmill" src="<?php echo esc_url(AQUILA_BUILD_IMG_URI . '/patterns/cover.jpg'); ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:heading {"textAlign":"center","textColor":"luminous-vivid-orange","fontSize":"x-large"} -->
            <h2 class="wp-block-heading has-text-align-center has-luminous-vivid-orange-color has-text-color has-x-large-font-size">
                <strong>Never let your memories be greater than<br>your dreams</strong>
            </h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size">
                <strong>A mind that is stretched by a new experience can never go back to its old<br>dimensions.</strong>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"textAlign":"center","style":{"color":{"gradient":"linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 95%,rgb(107,0,62) 100%)"}}} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-background has-text-align-center wp-element-button" style="background:linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 95%,rgb(107,0,62) 100%)">Learn More</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->
