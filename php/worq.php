<?php

include_once 'worq-propiedades.php';


/*
 * IMAGEN SIZE THUMB PROPIEDAD PEQUE
 */

add_image_size('thumb-propiedad', 388, 214, TRUE);



/*
 * IMAGEN SIZE THUMB PROPIEDAD DESTACADA
 */

add_image_size('thumb-propiedad-destacada', 819, 460, TRUE);




if (!function_exists('storefront_posted_on')) {

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function storefront_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
                _x('Posteado el %s', 'post date', 'storefront'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo wp_kses(apply_filters('storefront_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on), array(
            'span' => array(
                'class' => array(),
            ),
            'a' => array(
                'href' => array(),
                'title' => array(),
                'rel' => array(),
            ),
            'time' => array(
                'datetime' => array(),
                'class' => array(),
            ),
        ));
    }

}


/*
 * ACF
 */

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path($path) {

    // update path
    $path = get_template_directory() . '/php/advanced-custom-fields-worq/';

    // return
    return $path;
}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir($dir) {

    // update path
    $dir = get_template_directory() . '/php/advanced-custom-fields-worq/';

    // return
    return $dir;
}

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_template_directory() . '/php/advanced-custom-fields-worq/acf.php');



include_once 'worq-slider.php';

/*
 * BUSQUEDA SELECTOR TEMPLATE
 */

function template_chooser($template) {

    global $wp_query;
    $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';

    if ($wp_query->is_search && $post_type == 'propiedad') {
        return locate_template('search-propiedades.php');
    }

    return $template;
}

add_filter('template_include', 'template_chooser');




/*
 * OG META
 */

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype($output) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
    global $post;

    $default_image = get_template_directory_uri() . '/img/ideale-logo.svg'; //replace this with a default image on your server or an image in your media library

    if (!is_singular()) {
        //if it is not a post or a page


        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:site_name" content="Ideale Propiedades"/>';
        echo '<meta property="og:image" content="' . $default_image . '"/>';
        echo '<meta property="og:url" content="' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '"/>';
        return;
    }

    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="Ideale Propiedades"/>';
    if (!has_post_thumbnail($post->ID)) { //the post does not have featured image, use a default image
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    } else {
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
        echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
    }
    echo "";
}

add_action('wp_head', 'insert_fb_in_head', 5);
