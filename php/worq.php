<?php

include_once 'worq-slider.php';
include_once 'worq-propiedades.php';


/*
 * IMAGEN SIZE THUMB PROPIEDAD PEQUEña
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


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDgf-N1irsVUgupvllDsSa533VNJHzIeTo');
}

add_action('acf/init', 'my_acf_init');

