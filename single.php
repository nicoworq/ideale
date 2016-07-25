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
    ?>

    <div class="propiedades-relacionadas">
        <h4>Propiedades similares</h4>

        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <a href="#" class="propiedad propiedad-listado">
                        <div class="propiedad-imagen" style="background-image: url(<?php echo get_template_directory_uri() . '/img/img-propiedad.jpg' ?>)">

                            <div class="propiedad-triangulo1"></div>
                            <div class="propiedad-triangulo2"></div>

                            <div class="propiedad-tipo-operacion">
                                Venta 
                            </div>
                            <div class="propiedad-precio">
                                $1.564.500
                            </div>
                        </div>

                        <div class="propiedad-datos">
                            <div class="propiedad-ubicacion">
                                Rosario, Santa Fé.
                            </div>
                            <div class="propiedad-direccion">
                                Av. San Martin 2950.
                                Piso 5 Dto:A.
                            </div>
                            <ul class="propiedad-info">
                                <li class="propiedad-zona">
                                    <span class="icono-zona"></span> Centro
                                </li>
                                <li class="propiedad-superficie">
                                    <span class="icono-medida"></span>140 mts2 | Dormitorios: 3
                                </li>

                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="propiedad propiedad-listado">
                        <div class="propiedad-imagen" style="background-image: url(<?php echo get_template_directory_uri() . '/img/img-propiedad.jpg' ?>)">

                            <div class="propiedad-triangulo1"></div>
                            <div class="propiedad-triangulo2"></div>

                            <div class="propiedad-tipo-operacion">
                                Venta 
                            </div>
                            <div class="propiedad-precio">
                                $1.564.500
                            </div>
                        </div>

                        <div class="propiedad-datos">
                            <div class="propiedad-ubicacion">
                                Rosario, Santa Fé.
                            </div>
                            <div class="propiedad-direccion">
                                Av. San Martin 2950.
                                Piso 5 Dto:A.
                            </div>
                            <ul class="propiedad-info">
                                <li class="propiedad-zona">
                                    <span class="icono-zona"></span> Centro
                                </li>
                                <li class="propiedad-superficie">
                                    <span class="icono-medida"></span>140 mts2 | Dormitorios: 3
                                </li>

                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="propiedad propiedad-listado">
                        <div class="propiedad-imagen" style="background-image: url(<?php echo get_template_directory_uri() . '/img/img-propiedad.jpg' ?>)">

                            <div class="propiedad-triangulo1"></div>
                            <div class="propiedad-triangulo2"></div>

                            <div class="propiedad-tipo-operacion">
                                Venta 
                            </div>
                            <div class="propiedad-precio">
                                $1.564.500
                            </div>
                        </div>

                        <div class="propiedad-datos">
                            <div class="propiedad-ubicacion">
                                Rosario, Santa Fé.
                            </div>
                            <div class="propiedad-direccion">
                                Av. San Martin 2950.
                                Piso 5 Dto:A.
                            </div>
                            <ul class="propiedad-info">
                                <li class="propiedad-zona">
                                    <span class="icono-zona"></span> Centro
                                </li>
                                <li class="propiedad-superficie">
                                    <span class="icono-medida"></span>140 mts2 | Dormitorios: 3
                                </li>

                            </ul>
                        </div>
                    </a>
                </div>


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
