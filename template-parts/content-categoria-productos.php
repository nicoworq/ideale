<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Durand
 */
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section id="detalle-categoria-producto" style="background-image:url(<?php echo $feat_image ?>); ">
        <div>
            <h1><?php the_field('titulo_descriptivo') ?></h1> 
        </div>
    </section>


    <section id="detalle-categoria-mobile">
        <h2>
            <?php the_field('subtitulo') ?>
        </h2>

        <div class="descripcion-categoria">
            <?php the_field('descripcion_categoria') ?>
        </div>
    </section>

    <section id="detalle-categoria-producto-contenido">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>
                        <?php the_field('subtitulo') ?>
                    </h2>


                    <div class="descripcion-categoria">
                        <?php the_field('descripcion_categoria') ?>
                    </div>




                    <div id="proyecto-imagenes">

                        <?php
                        $images = get_field('galeria_imagenes');
                        if ($images):
                            ?>

                            <div id="proyecto-galeria">
                                <div id="galeria-nav">
                                    <div class="gal-prev gal-nav">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 108.981 48.548" enable-background="new 0 0 108.981 48.548"
                                             xml:space="preserve" >
                                            <g>
                                                <defs>
                                                    <rect id="SVGID_1_" y="0" width="108.981" height="48.548"/>
                                                </defs>
                                                <clipPath id="SVGID_2_">
                                                    <use xlink:href="#SVGID_1_"  overflow="visible"/>
                                                </clipPath>
                                                <path clip-path="url(#SVGID_2_)" d="M108.977,24.226c0.013-0.888-0.313-1.779-0.989-2.455L87.21,0.994
                                                      c-1.324-1.325-3.48-1.325-4.807,0c-1.324,1.324-1.324,3.48,0.002,4.805l15.077,15.077H3.398C1.524,20.876,0,22.401,0,24.275
                                                      c0,1.873,1.524,3.397,3.398,3.397h94.083L82.405,42.749c-1.326,1.325-1.326,3.481-0.001,4.807s3.48,1.324,4.806-0.001
                                                      l20.777-20.777c0.675-0.676,1.002-1.566,0.989-2.454c0-0.016,0.005-0.032,0.005-0.048
                                                      C108.981,24.258,108.977,24.243,108.977,24.226"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="gal-next gal-nav">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 108.981 48.548" enable-background="new 0 0 108.981 48.548"
                                             xml:space="preserve" >
                                            <g>
                                                <defs>
                                                    <rect id="SVGID_1_" y="0" width="108.981" height="48.548"/>
                                                </defs>
                                                <clipPath id="SVGID_2_">
                                                    <use xlink:href="#SVGID_1_"  overflow="visible"/>
                                                </clipPath>
                                                <path clip-path="url(#SVGID_2_)" d="M108.977,24.226c0.013-0.888-0.313-1.779-0.989-2.455L87.21,0.994
                                                      c-1.324-1.325-3.48-1.325-4.807,0c-1.324,1.324-1.324,3.48,0.002,4.805l15.077,15.077H3.398C1.524,20.876,0,22.401,0,24.275
                                                      c0,1.873,1.524,3.397,3.398,3.397h94.083L82.405,42.749c-1.326,1.325-1.326,3.481-0.001,4.807s3.48,1.324,4.806-0.001
                                                      l20.777-20.777c0.675-0.676,1.002-1.566,0.989-2.454c0-0.016,0.005-0.032,0.005-0.048
                                                      C108.981,24.258,108.977,24.243,108.977,24.226"/>
                                            </g>
                                        </svg>
                                    </div>
                                </div>


                                <ul>
                                    <?php foreach ($images as $image): ?>
                                        <li style="background-image: url(<?php echo $image['url']; ?>)">
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>


                        <?php endif; ?>



                        <?php
                        $imagenFija1 = get_field('imagen_fija_1');
                        $imagenFija2 = get_field('imagen_fija_2');
                        if ($imagenFija1) {
                            ?>
                            <div id="proyecto-imagenes-fijas">                      
                                <div class="proyecto-imagen-fija proyecto-imagen-fija1" style="background-image: url(<?php echo $imagenFija1['url'] ?>);"></div>
                                <div class="proyecto-imagen-fija proyecto-imagen-fija2" style="background-image: url(<?php echo $imagenFija2['url'] ?>);"></div>

                            </div>   
                            <?php
                        }
                        ?>


                    </div>

                </div>
            </div>
        </div>
    </section>



    <?php
    if (have_rows('ejemplo_de_productos')):

        // loop through the rows of data
        while (have_rows('ejemplo_de_productos')) : the_row();

            $images = get_sub_field('galeria_de_imagenes');
            ?>

            <section class="categoria-ejemplo-producto">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><?php the_sub_field('titulo_ejemplo'); ?></h3>

                            <ul class="categoria-ejemplo-producto-galeria">                               
                                <?php foreach ($images as $image): ?><li>
                                        <a href="<?php echo $image['url']; ?>" style="background-image: url(<?php echo $image['sizes']['thumbnail']; ?>)">

                                        </a>                                        
                                    </li><?php endforeach; ?>                                
                            </ul>
                            <a href="#" class="interesado" data-producto-interes="<?php the_sub_field('titulo_ejemplo'); ?>">Estoy interesado</a>
                        </div>

                    </div>
                </div>

            </section>

            <?php
        endwhile;

    endif;
    ?>



</article><!-- #post-## -->

