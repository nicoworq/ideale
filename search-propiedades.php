<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Villber
 */
get_header();
?>


<section id="venta" class="page-header">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Busqueda: <br/>
                    </h1>
            </div>
        </div>
    </div>


</section>
<div class="blog">
    <div class="container blog">
        <div class="row">
            <div class="col-md-12">


                <div id="primary" class="content-area blog-page">
                    <main id="main" class="site-main" role="main">
                        <?php
                        if (have_posts()) :

                            while (have_posts()) : the_post();

                                /**
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('/template-parts/content');

                            endwhile;
                        endif;
                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->

                <div id="secondary" class="widget-area" role="complementary">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div><!-- #secondary -->
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
