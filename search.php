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

<section id="header-blog">  
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><?php printf(esc_html__('Resultados para: %s', 'durand'), '<span>' . get_search_query() . '</span>'); ?></h2>
            </div>
        </div>
    </div>
</section>


<section id="blog-suscribe">
    <div class="ajaxing"><span></span></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Seguí la actulidad inmobiliaria en tu mail y conocé nuestras nuevas propiedades</h4>

                <form id="form-suscribir-blog">

                    <input type="hidden" name="suscribir" value="<?php echo wp_create_nonce('news-nonce') ?>"/>
                    <input type="hidden" name="action" value="newsletter"/>
                    <input type="text" name="sexo" placeholder="Sexo" value=""/>
                    <input type="email" placeholder="Ingresa tu email..." name="email"/>
                    <button class="bt-site bt-site-violet">Suscribirme</button>
                </form>
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
