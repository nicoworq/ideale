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
get_template_part('template-parts/content', '12-anios');
get_template_part('template-parts/content', 'form-contacto');
get_footer();
