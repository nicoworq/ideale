<?php
/**
 * Template part for displaying single posts.
 *
 * @package Idele
 */
$url_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'imagen-thumb-propiedad');

//imagenes lightbox galeria

$imgLightbox = array($url_thumb[0]);
?>



<article id="post-<?php the_ID(); ?>" >


    <div class="post-propiedad-header">
        <div class="header-left">
            <a href='#' class="post-propiedad-thumbnail" style="background-image:url(<?php echo $url_thumb[0] ?>);"></a>  
            
            <div class="post-propiedad-galeria">
                <?php
                if (have_rows('galeria')) {
                    echo "<ul id='slider-galeria'>";
                    while (have_rows('galeria')) {
                        the_row();
                        $imagen = get_sub_field('imagen_propiedad');
                        $imgLightbox[] = $imagen['url'];
                        echo "<li class='slide'><a href='#' data-imagelightbox='f'><img src='{$imagen['sizes']['thumbnail']}' alt='Imagen propiedad'/></a></li>";
                    }
                    echo "</ul>";
                }
                ?>
            </div> 
            <script>

                window.imagenesSlick = <?php echo json_encode($imgLightbox); ?>;

            </script>
        </div>
        <div class="header-right">
            <div class="post-propiedad-mapa">

                <?php
                $location = get_field('mapa');

                if (!empty($location)):
                    ?>
                    <div class="ideale-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="post-propiedad-datos">

                <h4 class="propiedad-ubicacion"><?php the_field('localidad') ?>,&nbsp;<?php the_field('provincia') ?></h4>               


                <h1 class="propiedad-direccion"><?php the_field('direccion') ?></h1>


                <div class="propiedad-texto">
                    <?php the_content(); ?>
                </div>

                <ul class="propiedad-info">
                    <li class="propiedad-zona">
                        Zona <span><?php the_field('zona') ?></span>
                    </li>

                    <?php if (get_field('barrio')) {
                        ?>
                        <li>Barrio <span><?php the_field('barrio') ?></span></li>
                    <?php }
                    ?>
                    <li class="propiedad-superficie">
                        Superficie <span><?php the_field('medidas') ?> <?php the_field('unidad_medidas'); ?> </span>
                    </li>

                    <?php if (get_field('dormitorios')) {
                        ?>
                        <li class="propiedad-dormitorios">
                            Dormitorios: <span><?php the_field('dormitorios') ?></span>
                        </li>
                    <?php }
                    ?>

                </ul>



                <h3 class="propiedad-precio"><?php the_field('moneda'); ?> <?php echo number_format(get_field('precio'), 0, ',', '.'); ?></h3>


            </div>

            <div class="propiedad-contacto">

                <h3>Si te interesó, dejanos tus datos, te vamos a contactar a la brevedad.</h3>
                <div class="ajaxing">
                    <span></span>
                </div>

                <form id="form-contacto-propiedad" method="post">
                    <input type="text" name="sex" placeholder="Sexo" value=""/>
                    <input type="hidden" name="propiedad" value="<?php the_title(); ?>"/>
                    <input type="hidden" name="action" value="propiedad"/>
                    <input type="text" name="nombre" placeholder="Nombre y apellido"/>
                    <input type="text" name="email" placeholder="Email"/>
                    <input type="text" name="telefono" placeholder="Tel&eacute;fono"/>
                    <textarea name="mensaje" placeholder="Mensaje"></textarea>
                    <input type="submit" value="Enviar"/>
                </form>
            </div>

        </div>
        <div class="col-md-3 propiedad-sidebar">
            <div class="propiedad-fb">
                <div class="fb-page" data-href="https://www.facebook.com/experienciasdigitales" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/experienciasdigitales" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/experienciasdigitales">WORQ</a></blockquote></div>
            </div>

            <div class="propiedades-recomendadas">
                <h1>Propiedades recomendadas</h1>

                <ul>
                    <?php
                    $args = array(
                        'post_type' => 'propiedad',
                        'posts_per_page' => 4,
                        'meta_key' => 'propiedad_recomendada',
                        'meta_value' => TRUE,
                    );
                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()) {
                        $i = 1;
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            ?>
                            <li>
                                <a href='<?php the_permalink(); ?>' class="propiedad-recomendada">
                                    <h5><?php the_field('localidad') ?>,&nbsp;<?php the_field('provincia') ?></h5>
                                    <h3><?php the_title(); ?></h3>
                                    <h4><?php the_field('moneda'); ?> <?php echo number_format(get_field('precio'), 0, ',', '.'); ?></h4>
                                </a>
                            </li>
                            <?php
                        }
                    } else {
                        ?>
                        <li>
                            <a href='#' class="propiedad-recomendada">                            
                                <h3>No hay propiedades.</h3>                            
                            </a>
                        </li>
                        <?php
                        echo "<h3>No has configurado ningun proyecto para que aparezca en la home.</h3>";
                    }

                    wp_reset_postdata();
                    ?>
                </ul>
            </div>

        </div>
    </div>
</article><!-- #post-## -->





<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7&appId=388886614495246";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>