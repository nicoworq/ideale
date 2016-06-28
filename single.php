<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Villber
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) : the_post();

            if (get_post_type() === 'categoria-productos') {

                get_template_part('template-parts/content', 'categoria-productos');
            }


        //the_post_navigation();



        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_template_part('template-parts/content', 'form-contacto');
?>
<section id="home-map">

</section>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDgf-N1irsVUgupvllDsSa533VNJHzIeTo"></script>
<?php
get_footer();
