<section id="home-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Actualidad inmobiliaria <a href="<?php echo get_permalink(get_page_by_title('Actualidad')) ?>">Ver todas las noticias</a></h2>

            </div>
        </div>
        <div class="row">

            <?php
            $args = array(
                'posts_per_page' => 3,
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) {
                $i = 1;
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');

                    $post_cat = get_the_category();
                    ?>
                    <div class="col-md-4">
                        <a href="<?php the_permalink(); ?>" class="nota-blog">
                            <div class="nota-blog-bg" style="background-image:url(<?php echo $feat_image[0]; ?>);"></div>
                            <h3><?php the_title(); ?></h3>
                            <div class="nota-ver-mas">Seguir leyendo</div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="col-md-4">
                    <a href="#" class="nota-blog">
                        <div class="nota-blog-bg"></div>
                        <h3>No hay noticias de actualidad</h3>
                    </a>    
                </div>


                <?php
            }

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>