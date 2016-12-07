<?php

/**
 * Durand functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Villber
 */
if (!function_exists('ideale_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ideale_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Durand, use a find and replace
         * to change 'ideale' to the name of your theme in all the template files.
         */
        load_theme_textdomain('ideale', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'ideale'),
            'secondary' => esc_html__('Secondary', 'ideale'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('ideale_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif;
add_action('after_setup_theme', 'ideale_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ideale_content_width() {
    $GLOBALS['content_width'] = apply_filters('ideale_content_width', 640);
}

add_action('after_setup_theme', 'ideale_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ideale_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'ideale'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'ideale'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'ideale_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ideale_scripts() {

    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
    wp_enqueue_script('jquery');

    wp_enqueue_style('ideale-boot', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('ideale-style', get_template_directory_uri() . '/css/main.min.css?a=b');

    wp_enqueue_style('ideale-style-ext', get_template_directory_uri() . '/css/externalCss.css');

    if (is_single()) {
        wp_enqueue_style('ideale-slick-theme', get_template_directory_uri() . '/css/slick-theme.css');
    }

    //wp_enqueue_script('ideale-modernzr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', array(), '20151215', false);
    wp_enqueue_script('ideale-plugins', get_template_directory_uri() . '/js/plugins.min.js', array('jquery'), '20151215', true);
    wp_enqueue_script('ideale-scripts', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '20151215', true);
    wp_localize_script('ideale-scripts', 'Ideale', array('ajaxUrl' => admin_url('admin-ajax.php'), 'themeUrl' => get_stylesheet_directory_uri()));
}

add_action('wp_enqueue_scripts', 'ideale_scripts');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
//require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';


/*
 * AJAX SEND MAIL
 */

require_once get_template_directory() . '/php/ajax-contact-mail.php';




/*
 * MOBILE DETECT
 */

require_once get_template_directory() . '/php/mobile-detect.php';


/*
 * JQUERY MIGRATE
 */

add_filter('wp_default_scripts', 'remove_jquery_migrate');

function remove_jquery_migrate(&$scripts) {
    if (!is_admin()) {
        $scripts->remove('jquery');
        $scripts->add('jquery', false, array('jquery-core'), '1.10.2');
    }
}

function my_deregister_scripts() {
    wp_deregister_script('wp-embed');
}

add_action('wp_enqueue_scripts', 'my_deregister_scripts');



/*
 * versionado CSS
 */

// Remove WP Version From Styles	
add_filter('style_loader_src', 'sdt_remove_ver_css_js', 9999);
// Remove WP Version From Scripts
add_filter('script_loader_src', 'sdt_remove_ver_css_js', 9999);

// Function to remove version numbers
function sdt_remove_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

include_once 'php/worq.php';
