<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Template Actualidad
 *
 */
get_header();
?>

<section id="header-blog">  
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Actualidad</h2>
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
