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
    wp_enqueue_style('ideale-style', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('ideale-style-ext', get_template_directory_uri() . '/css/externalCss.min.css');



    //wp_enqueue_script('ideale-modernzr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', array(), '20151215', false);
    wp_enqueue_script('ideale-plugins', get_template_directory_uri() . '/js/plugins.min.js', array('jquery'), '20151215', true);
    wp_enqueue_script('ideale-scripts', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '20151215', true);
    wp_localize_script('ideale-scripts', 'Villber', array('ajaxUrl' => admin_url('admin-ajax.php'), 'themeUrl' => get_stylesheet_directory_uri()));
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
 * AJAX FORM CONTACTO
 */

require_once get_template_directory() . '/php/ajax-form-contacto.php';

/*
 * AJAX FORM NEWSLETTER
 */

require_once get_template_directory() . '/php/ajax-form-newsletter.php';




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

// Register Custom Post Type
function categoria_ideale() {

    $labels = array(
        'name' => _x('Categorias Productos', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Categoría Producto', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Categorias Productos', 'text_domain'),
        'name_admin_bar' => __('Categorias Productos', 'text_domain'),
        'archives' => __('Categorias Productos', 'text_domain'),
        'parent_item_colon' => __('Categoría padre', 'text_domain'),
        'all_items' => __('Todas las Categoría', 'text_domain'),
        'add_new_item' => __('Agregar Categoría', 'text_domain'),
        'add_new' => __('Agregar nueva', 'text_domain'),
        'new_item' => __('Agregar Categoría', 'text_domain'),
        'edit_item' => __('Editar Categoría', 'text_domain'),
        'update_item' => __('Actualizar Categoría', 'text_domain'),
        'view_item' => __('Ver Categoría', 'text_domain'),
        'search_items' => __('Buscar Categoría', 'text_domain'),
        'not_found' => __('No encontrado', 'text_domain'),
        'not_found_in_trash' => __('No encontrado', 'text_domain'),
        'featured_image' => __('Imagen destacada', 'text_domain'),
        'set_featured_image' => __('Setear Imagen destacada', 'text_domain'),
        'remove_featured_image' => __('Eliminar Imagen destacada', 'text_domain'),
        'use_featured_image' => __('Usar como Imagen destacada', 'text_domain'),
        'insert_into_item' => __('Insertar en Categoría', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Categoría Producto', 'text_domain'),
        'description' => __('Categorias Productos de Villber', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'author', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-clipboard',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('categoria-productos', $args);
}

add_action('init', 'categoria_ideale', 0);


/*
 * SLIDER WORQ 
 */

// Register Custom Post Type SLIDE

function slide_home() {

    $labels = array(
        'name' => _x('Slides Home', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Slide Home', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Slides Home', 'text_domain'),
        'name_admin_bar' => __('Slides Home', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('Todos los slides', 'text_domain'),
        'add_new_item' => __('Agregar slide', 'text_domain'),
        'add_new' => __('Agregar nuevo', 'text_domain'),
        'new_item' => __('Nuevo slide', 'text_domain'),
        'edit_item' => __('Editar slide', 'text_domain'),
        'update_item' => __('Actualizar slide', 'text_domain'),
        'view_item' => __('Ver slide', 'text_domain'),
        'search_items' => __('Buscar slide', 'text_domain'),
        'not_found' => __('No encontrado', 'text_domain'),
        'not_found_in_trash' => __('No encontrado en papelera', 'text_domain'),
        'featured_image' => __('Imagen destacada', 'text_domain'),
        'set_featured_image' => __('Setear imagen destacada', 'text_domain'),
        'remove_featured_image' => __('Eliminar imagen destacada', 'text_domain'),
        'use_featured_image' => __('Usar como imagen destacada', 'text_domain'),
        'insert_into_item' => __('Insertar en slider', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Slide Home', 'text_domain'),
        'description' => __('Slide del slider en la home', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title',),
        'taxonomies' => array(''),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('slide_home', $args);
}

add_action('init', 'slide_home', 0);

add_shortcode('slider-worq', 'mostrar_slider_worq');

function mostrar_slider_worq() {
    $detect = new Mobile_Detect;
    $args = array(
        'numberposts' => -1,
        'post_type' => 'slide_home',
        'meta_key' => 'activo',
        'meta_value' => TRUE
    );

    $slides = new WP_Query($args);
    ?>

    <?php if ($slides->have_posts()): ?>
        <div id="slider-worq">

            <div id="slider-worq-slides">
                <?php
                while ($slides->have_posts()) : $slides->the_post();
                    $img_mobile = get_field('imagen_mobile');
                    $img_desktop = get_field('imagen_de_fondo');
                    if (!$img_mobile) {
                        $img_mobile = $img_desktop;
                    }

                    $imgBg = $detect->is_mobile() ? $img_mobile : $img_desktop;
                    $titulo = get_field('titulo_slider');
                    $texto = get_field('texto_slider');
                    $texto_boton = get_field('texto_boton');
                    $link = get_field('link_slide');
                    $linkHref = $link ? "href='{$link}'" : '';
                    ?>

                    <div>
                        <div class="intro-module slider-home-bg" style="background-image: url(<?php echo $imgBg['url'] ?>);">


                            <div class="intro-module-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slider-contenido">
                                                <div class="slider-contenido-titulo"><?php echo $titulo; ?></div>
                                                <p><?php echo $texto; ?></p>
                                                <a class="bt-sitio bt-cta" href="<?php echo $linkHref; ?>" ><?php echo $texto_boton;?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endwhile; ?>
            </div>



            <div id="slider-worq-dots">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="dots-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    endif;

    wp_reset_query();  // Restore global post data stomped by the_post(). 
}

/*
 * REGISTRAR ACF
 */

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_slides-home',
        'title' => 'Slides Home',
        'fields' => array(
            array(
                'key' => 'field_56f9716896390',
                'label' => 'Imagen de fondo',
                'name' => 'imagen_de_fondo',
                'type' => 'image',
                'required' => 1,
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_56f971b996391',
                'label' => 'Imagen Mobile',
                'name' => 'imagen_mobile',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_titulo_worq',
                'label' => 'Título Slider',
                'name' => 'titulo_slider',
                'type' => 'wysiwyg',
                'default_value' => '',
                'placeholder' => 'Ingrese el titulo del slide',
                'toolbar' => 'full',
				'media_upload' => 'no',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_56f971cb96392',
                'label' => 'Texto Slider',
                'name' => 'texto_slider',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => 'Ingrese el texto',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_56f971e196393',
                'label' => 'Link slide',
                'name' => 'link_slide',
                'type' => 'page_link',
                'post_type' => array(
                    0 => 'post',
                    1 => 'page',
                    2 => 'product',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_574c979bf2983',
                'label' => 'Texto Boton',
                'name' => 'texto_boton',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_56f974b715091',
                'label' => 'Activo',
                'name' => 'activo',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'slide_home',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
}
