<?php 

function get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attribute = []) {
    $custom_thumbnail = '';

    if (null == $post_id) {
        $post_id = get_the_ID();
    }

    if (has_post_thumbnail($post_id)) {
        $default_attribute = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge($additional_attribute, $default_attribute);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $attributes
        );
    }

    return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attribute = []) {
    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attribute);
}


function aquila_posted_on(){
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    // Post is modified ( when post published time and modified time are different )

    if(get_the_time('U') !== get_the_modified_time('U')){
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
        <time class="updated" datetime="%3$s">%4$s</time>';
    } 

    // Replace %1$s with datetime attribute for the time element, and %2$s with the date/time string. and %3$s with datetime attribute for the time element, and %4$s with the date/time string.

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_attr(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_attr(get_the_modified_date())
    );
    
    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'aqula'),
        '<a href="'. esc_url(get_permalink()) .'" rel="bookmark">'. $time_string .'</a>'
    );

    echo '<span class="posted-on text-secondary">'. $posted_on .'</span>';

}

function aquila_posted_by(){
    $byline = sprintf(
        esc_html_x(' by %s', 'post author', 'aqula'),
        '<span class="author vcard"><a href="'. esc_url(get_author_posts_url(get_the_author_meta('ID'))) .'">'. esc_html(get_the_author()) .'</a></span>'
    );

    echo '<span class="byline text-secondary">'. $byline .'</span>';
}

// function for excerpt
function aquila_the_excerpt($trim_character_count = 0){
    $post_ID = get_the_ID();

    if(empty($post_ID)){
        return null;
    }


    if(!has_excerpt() || 0 === $trim_character_count){
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $trim_character_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . '[...]';
}

 //  function for read more button in excerpt
function aquila_excerpt_more($more = ''){
    if(!is_single()){
        $more = sprintf(
            '<button class="mt-4 btn btn-info"><a class="aquila-read-more text-white" href="%1$s">%2$s</a></button>',
            get_permalink(get_the_ID()),
            __('Read more', 'aqula')
        );
    }

    return $more;
} 


function aquila_pagination(){

$args = [
    'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
    'after_page_number' => '</span>'
];

$allowed_tags = [
    'span' => [
        'class' => []
    ],
    'a' => [
        'class' => [],
        'href' => [],
    ]
];


    printf(
        '<nav class="aqula-pagination mt-5">%s</nav>',
        wp_kses( paginate_links($args), $allowed_tags));
}

/**
 * Checks to see if the specified user id has a uploaded the image via wp_admin.
 *
 * @return bool  Whether or not the user has a gravatar
 */
function aquila_is_uploaded_via_wp_admin( $gravatar_url ) {

	$parsed_url = wp_parse_url( $gravatar_url );

	$query_args = ! empty( $parsed_url['query'] ) ? $parsed_url['query'] : '';

	// If query args is empty means, user has uploaded gravatar.
	return empty( $query_args );

}

/**
 * If the gravatar is uploaded returns true.
 *
 * There are two things we need to check, If user has uploaded the gravatar:
 * 1. from WP Dashboard, or
 * 2. or gravatar site.
 *
 * If any of the above condition is true, user has valid gravatar,
 * and the function will return true.
 *
 * 1. For Scenario 1: Upload from WP Dashboard:
 * We check if the query args is present or not.
 *
 * 2. For Scenario 2: Upload on Gravatar site:
 * When constructing the URL, use the parameter d=404.
 * This will cause Gravatar to return a 404 error rather than an image if the user hasn't set a picture.
 *
 * @param $user_email
 *
 * @return bool
 */
function aquila_has_gravatar( $user_email ) {

	$gravatar_url = get_avatar_url( $user_email );

	if ( aquila_is_uploaded_via_wp_admin( $gravatar_url ) ) {
		return true;
	}

	$gravatar_url = sprintf( '%s&d=404', $gravatar_url );

	// Make a request to $gravatar_url and get the header
	$headers = @get_headers( $gravatar_url );

	// If request status is 200, which means user has uploaded the avatar on gravatar site
	return preg_match( "|200|", $headers[0] );
}