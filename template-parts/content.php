<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php
        storefront_posted_on();
        ?>
        <a href="<?php the_permalink() ?>">
            <?php
            the_title('<h1 class="entry-title">', '</h1>');
            ?>
        </a>

    </header><!-- .entry-header -->
    <aside class="entry-meta">
        <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search.
            ?>
            <div class="author">
                <?php
                echo get_avatar(get_the_author_meta('ID'), 128);
                echo '<div class="label">' . esc_attr(__('Escrito por', 'storefront')) . '</div>';
                the_author_posts_link();
                ?>
            </div>
            <?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(__(', ', 'storefront'));

            if ($categories_list) :
                ?>
                <div class="cat-links">
                    <?php
                    echo '<div class="label">' . esc_attr(__('Posteado en', 'storefront')) . '</div>';
                    echo wp_kses_post($categories_list);
                    ?>
                </div>
            <?php endif; // End if categories.   ?>

            <?php
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', __(', ', 'storefront'));

            if ($tags_list) :
                ?>
                <div class="tags-links">
                    <?php
                    echo '<div class="label">' . esc_attr(__('Tagged', 'storefront')) . '</div>';
                    echo wp_kses_post($tags_list);
                    ?>
                </div>
            <?php endif; // End if $tags_list.   ?>

        <?php endif; // End if 'post' == get_post_type().   ?>

        <?php /*if (!post_password_required() && ( comments_open() || '0' != get_comments_number() )) : ?>
            <div class="comments-link">
                <?php echo '<div class="label">' . esc_attr(__('Comentarios', 'storefront')) . '</div>'; ?>
                <span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'storefront'), __('1 Comment', 'storefront'), __('% Comments', 'storefront')); ?></span>
            </div>
        <?php endif; */?>
    </aside>

    <div class="entry-content">

        <?php
        $urlThumb = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
        ?>

        <a href="<?php the_permalink(); ?>" class="entry-thumbnail" style="background-image: url(<?php echo $urlThumb; ?>);">

        </a>

        <a href="<?php the_permalink(); ?>" class="entry-excerpt">
            <?php
            the_excerpt();
            ?>
        </a>


        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'storefront'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
    <div class="clearfix"></div>


</article><!-- #post-## -->
