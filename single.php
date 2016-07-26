<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ideale
 */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php
                    while (have_posts()) : the_post();

                        if (get_post_type(get_the_ID()) !== 'propiedad') {

                            get_template_part('template-parts/content', 'single');
                        } else {

                            get_template_part('template-parts/content', 'single-propiedad');
                        }

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
</div>


<?php
if (get_post_type(get_the_ID()) === 'propiedad') {
    
    $category = get_the_category();

    $args = array(
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'category' => $category[0]->term_id,
        'post_type' => 'propiedad',
        'post_status' => 'publish',
        'suppress_filters' => true,
        'post__not_in' => array(get_the_ID())
    );
      wp_reset_postdata();
    $propiedades_relacionadas = get_posts($args);
    ?>

    <div class="propiedades-relacionadas">
        <h4>Propiedades similares</h4>

        <div class="container">
            <div class="row">

                <?php if (count($propiedades_relacionadas)) : ?>

                    <?php foreach ($propiedades_relacionadas as $propiedad) { ?>
                        <?php
                        global $post;
                        $post = $propiedad;
                        ?>
                        <div class="col-md-4">
                            <?php get_template_part('template-parts/content', 'propiedad-listado'); ?>
                        </div>
                        <?php
                    };
                    wp_reset_postdata();
                    ?>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'noprop'); ?>

                <?php endif; ?>


            </div>
        </div>


    </div>
    <?php
}
?>


<?php
get_template_part('template-parts/content', '12-anios');
get_template_part('template-parts/content', 'form-contacto');
get_footer();
