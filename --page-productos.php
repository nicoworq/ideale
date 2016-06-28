<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>

<section id="productos">

    <div id="productos-header">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h1>Conozca todos los productos de Villber</h1>
                </div>

            </div>

        </div>

    </div>

    <div id="productos-intro">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3>Prestamos atención en cada detalle, para que tengas los mejores
                        amoblamientos del mercado.</h3>

                </div>

            </div>
            <div class="row">

                <div class="col-md-6">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining.</p>

                </div>
                <div class="col-md-6">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining.</p>

                </div>

            </div>

        </div>
    </div>


    <div id="productos-listado">


        <?php
        $args = array(
            'post_type' => 'producto_villber',
            'posts_per_page' => 0,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {

            while ($the_query->have_posts()) {
                $the_query->the_post();
                $feat_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                ?>
                <div class="producto-villber">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <h1><?php the_title(); ?></h1>

                                <?php
                                $images = get_field('imagenes_producto');
                                ?>

                                <ul class="producto-imagenes">                               
                                    <?php foreach ($images as $image): ?><li>
                                            <a href="<?php echo $image['url']; ?>" style="background-image: url(<?php echo $image['sizes']['thumbnail']; ?>)">

                                            </a>                                        
                                        </li><?php endforeach; ?>                                
                                </ul>
                                <a href="#" class="interesado">Estoy interesado</a>

                            </div>

                        </div>

                    </div>
                    <?php
                    ?>

                </div>
                <?php
            }
        }

        wp_reset_postdata();
        ?>

    </div>

</section>





<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDgf-N1irsVUgupvllDsSa533VNJHzIeTo"></script>

<?php
get_footer();
