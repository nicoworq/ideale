<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Home Normal
 *
 */
get_header();
?>

<section id="slider-home">
    <?php
    echo do_shortcode('[slider-worq]')
    ?>
</section>

<section id="home-contenido">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Soluciones Inmobiliarias<br/>
                    para confiar tu nuevo comienzo</h2>
            </div>
        </div>       
    </div>
    <?php get_template_part('template-parts/content', 'valores'); ?>
</section>


<section id="home-servicios">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo get_permalink(get_page_by_title('Alquiler')); ?>" id="alquiler-home" class="servicio-home">
                    <div class="servicio-home-bg">
                        <img src="<?php echo get_template_directory_uri() . '/img/alquiler-home.jpg' ?>"/>
                    </div>
                    <div class="servicio-home-contenido">
                        <h3>alquileres</h3>
                        <p>Propiedades a tu medidad,<br/>
                            con la tranquilidad que<br/>
                            solo Ideale puede darte.</p>
                    </div>
                </a>
                <a href="<?php echo get_permalink(get_page_by_title('Ventas')); ?>" id="venta-home" class="servicio-home">
                    <div class="servicio-home-bg">
                        <img src="<?php echo get_template_directory_uri() . '/img/venta-home.jpg' ?>"/>
                    </div>
                    <div class="servicio-home-contenido">
                        <h3>Ventas</h3>
                        <p>Te ayudamos a hacer<br/>
                            realidad la propiedad<br/>
                            que tanto imagabas.</p>
                    </div>

                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>


<section id="home-servicios-acceso">
    <h2>Nuestros servicios</h2>

    <p>Pensamos en nuestros clientes como "socios estratégicos".<br/>
        Nos especializamos en otorgar un valor agregado a las propiedades siendo intermediarios responsables en la compra, venta y alquiler.
        <br/>Administramos con el compromiso de cumplir lo pactado y responder profesionalmente ante cualquier imprevisto.<br/>
        Potenciamos el valor de los inmuebles con nuestro asesoramiento jurídico y financiero.
    </p>

    <a class="bt-sitio" href="<?php echo get_permalink(get_page_by_title('Servicios')); ?>">
        ¡Quiero saber más!
    </a>
</section>

<?php get_template_part('template-parts/content', 'propiedad-destacada'); ?>
<?php get_template_part('template-parts/content', 'home-blog'); ?>
<?php get_template_part('template-parts/content', '12-anios'); ?>
<?php get_template_part('template-parts/content', 'form-contacto'); ?>

<?php
get_footer();
