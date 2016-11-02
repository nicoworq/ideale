
<?php
$args = array(
    'post_type' => 'propiedad',
    'posts_per_page' => 1,
    'meta_key' => 'propiedad_destacada',
    'meta_value' => TRUE,
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
    $i = 1;
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');

        $post_cat = get_the_category();
        ?>

        <section id="home-propiedad-destacada">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="propiedad">
                            
                            <div class="propiedad-imagen-mobile" style="background-image: url(<?php echo $feat_image[0]; ?>);">

                            </div>
                            
                            <div class="propiedad-datos">
                                <div class="propiedad-tipo-operacion">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="6" height="9" viewBox="0 0 6 9">
                                            <image id="arrow487_1_" data-name="arrow487 (1)" width="6" height="9" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAYAAAAJCAMAAAAmRK2vAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAACa+yuyAAAAH3RSTlMA5JcEZvy5Dkfy0h4u4uczQcnv2CJf+r8RgaIGwHQB5TrDFQAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAA5SURBVAjXY2BkYmYAAhZWNnYQzcHJxQ2ieXj5+EG0gLwgiBQSFmFgEBUTl2BgkJSXkgYKycjKAUkAL8MCIOETNvYAAAAASUVORK5CYII="/>
                                        </svg></span>
                                    <?php
                                    $category = get_the_category();
                                    echo $category[0]->name
                                    ?> | <?php echo ucfirst(get_field('tipo_propiedad'))  ?>
                                </div>
                                <div class="propiedad-ubicacion">
                                    <?php the_field('localidad') ?>, <?php the_field('provincia') ?>.
                                </div>
                                <div class="propiedad-direccion">
                                    <?php the_field('direccion') ?>
                                </div>
                                <div class="propiedad-intro">
                                    <?php the_excerpt(); ?>
                                </div>

                                <ul class="propiedad-info">
                                    <li class="propiedad-zona">
                                        <span></span>Zona:  <?php the_field('zona') ?>
                                    </li>
                                    <li class="propiedad-superficie">
                                        <span></span>Superficie:<?php the_field('medidas') ?> <?php the_field('unidad_medidas'); ?>| Dormitorios: <?php the_field('dormitorios') ?>
                                    </li>
                                </ul>

                                <div class="propiedad-precio">
                                    <?php the_field('moneda') ?><?php echo number_format(get_field('precio'), 0, ',', '.'); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="bt-sitio bt-ver-propiedad-home ">
                                    Ver propiedad
                                </a>
                            </div>
                            <div class="propiedad-imagen" style="background-image: url(<?php echo $feat_image[0]; ?>);">

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

wp_reset_postdata();


