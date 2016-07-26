
<?php
$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail_size');
$url = $thumb['0'];
?>

<a href="<?php the_permalink() ?>" class="propiedad propiedad-listado">
    <div class="propiedad-imagen" style="background-image: url(<?php echo $url ?>);">

        <div class="propiedad-triangulo1"></div>
        <div class="propiedad-triangulo2"></div>

        <div class="propiedad-tipo-operacion">
            <?php 
            $category = get_the_category();
            
            echo $category[0]->name
            
            ?>
        </div>
        <div class="propiedad-precio">
            <?php the_field('moneda') ?><?php echo number_format(get_field('precio'), 0, ',', '.'); ?>
        </div>
    </div>

    <div class="propiedad-datos">
        <div class="propiedad-ubicacion">
            <?php the_field('localidad') ?>, <?php the_field('provincia') ?>.
        </div>
        <div class="propiedad-direccion">
            <?php the_field('direccion') ?>
        </div>
        <ul class="propiedad-info">
            <li class="propiedad-zona">
                <span class="icono-zona"></span> <?php the_field('zona') ?>
            </li>
            <li class="propiedad-superficie">
                <span class="icono-medida"></span><?php the_field('medidas') ?> <?php the_field('unidad_medidas'); ?>  | Dormitorios: <?php the_field('dormitorios') ?>
            </li>

        </ul>
    </div>
</a>