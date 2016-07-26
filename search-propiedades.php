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
                <h1>Resultados de búsqueda: <br/>
                </h1>
            </div>
        </div>
    </div>


</section>

<section id="venta-contenido">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id="form-buscar-propiedad" role="search" action="<?php echo site_url('/'); ?>" method="get">
                    <input type="text" name='s' placeholder="Buscar" value="<?php echo get_query_var('s')?>"/>
                    <input type="hidden" name="post_type" value="propiedad"/>
                </form>
            </div>
        </div>
        <div class="row">

            <?php
            if (have_posts()) :

                while (have_posts()) : the_post();
            
                     if (get_post_type(get_the_ID()) !== 'propiedad') {

                            get_template_part('template-parts/content', 'single');
                        }
            
                    ?>
                    <div class="col-md-4">
                        <?php get_template_part('template-parts/content', 'propiedad-listado'); ?>
                    </div>
                    <?php
                endwhile;
            else :
                get_template_part('template-parts/content', 'noprop');

            endif;
            ?>

        </div>
    </div>
</section>

<?php
get_footer();
