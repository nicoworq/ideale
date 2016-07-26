<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();


$args = array(
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    'category' => 6,
    'post_type' => 'propiedad',
    'post_status' => 'publish',
    'suppress_filters' => true
);

$posts_array = get_posts($args);
?>

<section id="venta" class="page-header">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Propiedades <br/>
                    En venta</h1>
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
                    <input type="hidden" name="post_type" value="propiedad" />
                </form>
            </div>

        </div>
        <div class="row">


            <?php if (count($posts_array)) : ?>

                <?php foreach ($posts_array as $propiedad) { ?>

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
</section>



<?php get_template_part('template-parts/content', 'home-blog'); ?>
<?php get_template_part('template-parts/content', 'form-contacto'); ?>



<?php
get_footer();
