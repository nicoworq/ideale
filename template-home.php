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
                <a href="#" id="alquiler-home" class="servicio-home">
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
                <a href="#" id="venta-home" class="servicio-home">
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
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    <a class="bt-sitio" href="<?php echo get_permalink(get_page_by_title('Servicios')); ?>">
        ¡Quiero saber más!
    </a>
</section>


<section id="home-propiedad-destacada">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="propiedad">
                    <div class="propiedad-datos">
                        <div class="propiedad-tipo-operacion">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="6" height="9" viewBox="0 0 6 9">
                                <image id="arrow487_1_" data-name="arrow487 (1)" width="6" height="9" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAYAAAAJCAMAAAAmRK2vAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAACa+yuyAAAAH3RSTlMA5JcEZvy5Dkfy0h4u4uczQcnv2CJf+r8RgaIGwHQB5TrDFQAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAA5SURBVAjXY2BkYmYAAhZWNnYQzcHJxQ2ieXj5+EG0gLwgiBQSFmFgEBUTl2BgkJSXkgYKycjKAUkAL8MCIOETNvYAAAAASUVORK5CYII="/>
                                </svg></span>
                            Alquiler
                        </div>
                        <div class="propiedad-ubicacion">
                            Rosario, Santa Fé.
                        </div>
                        <div class="propiedad-direccion">
                            Av. San Martin 2950.
                            Piso 5 Dto:A.
                        </div>
                        <div class="propiedad-intro">
                            Excepcional monoambiente, pegado a la UAI
                            de Ov Lagos. Amplio. Luminoso. A estrenar.
                        </div>

                        <ul class="propiedad-info">
                            <li class="propiedad-zona">
                                <span></span>Zona: Centro
                            </li>
                            <li class="propiedad-superficie">
                                <span></span>Superficie:140 mts2 | Dormitorios: 3
                            </li>
                        </ul>

                        <div class="propiedad-precio">
                            $4.500
                        </div>
                        <a href="#" class="bt-sitio bt-ver-propiedad-home ">
                            Ver propiedad
                        </a>
                    </div>
                    <div class="propiedad-imagen" style="background: url(<?php echo get_template_directory_uri() . '/img/imagen-propiedad.jpg' ?>);">

                    </div>

                </div>


            </div>
        </div>
    </div>
</section>



<?php get_template_part('template-parts/content', 'home-blog'); ?>
<?php get_template_part('template-parts/content', '12-anios'); ?>
<?php get_template_part('template-parts/content', 'form-contacto'); ?>

<?php
get_footer();
