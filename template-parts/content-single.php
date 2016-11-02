<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ideale
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_single()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">

                <span class="posted-on">
                    <?php
                    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
                    $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
                    );
                    ?>
                    Posteado el <?php echo $time_string; ?>
                </span>


            </div><!-- .entry-meta -->
<?php endif;
?>
    </header><!-- .entry-header -->

    <div class="entry-content">

        <?php
        $urlThumb = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
        ?>

        <div class="entry-thumbnail" style="background-image: url(<?php echo $urlThumb; ?>);"></div>

        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'ideale'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->


</article><!-- #post-## -->