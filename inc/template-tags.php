<?php
/**
 * Custom template tags for Ahava Medical theme
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function ahava_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf($time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Prints HTML with meta information for the current author.
 */
function ahava_posted_by() {
    $byline = sprintf(
        /* translators: %s: post author. */
        esc_html_x('by %s', 'post author', 'ahava-medical'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>';
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ahava_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list(esc_html__(', ', 'ahava-medical'));
        if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'ahava-medical') . '</span>', $categories_list);
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'ahava-medical'));
        if ($tags_list) {
            /* translators: 1: list of tags. */
            printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'ahava-medical') . '</span>', $tags_list);
        }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ahava-medical'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Edit <span class="screen-reader-text">%s</span>', 'ahava-medical'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            wp_kses_post(get_the_title())
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function ahava_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) :
        ?>

        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>

        <?php else : ?>

        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail('post-thumbnail', array(
                'alt' => the_title_attribute(array(
                    'echo' => false,
                )),
            ));
            ?>
        </a>

        <?php
    endif;
}

/**
 * Prints the link to the comments for the current post.
 */
function ahava_comments_link() {
    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ahava-medical'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );
        echo '</span>';
    }
}

/**
 * Prints the post navigation.
 */
function ahava_post_navigation() {
    $navigation = ahava_get_post_navigation();
    if (!empty($navigation['prev']) || !empty($navigation['next'])) {
        echo '<nav class="post-navigation">';
        if (!empty($navigation['prev'])) {
            echo '<div class="nav-previous">' . $navigation['prev'] . '</div>';
        }
        if (!empty($navigation['next'])) {
            echo '<div class="nav-next">' . $navigation['next'] . '</div>';
        }
        echo '</nav>';
    }
}

/**
 * Prints the post pagination.
 */
function ahava_pagination() {
    echo ahava_get_pagination();
}

/**
 * Prints the post comments.
 */
function ahava_comments() {
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
}

/**
 * Prints the related posts.
 */
function ahava_related_posts($count = 3) {
    $related_posts = ahava_get_related_posts($count);
    if (!empty($related_posts)) :
        ?>
        <div class="related-posts">
            <h3><?php esc_html_e('Related Posts', 'ahava-medical'); ?></h3>
            <ul>
                <?php foreach ($related_posts as $post) : ?>
                    <li>
                        <a href="<?php echo esc_url($post['url']); ?>">
                            <?php if ($post['thumbnail']) : ?>
                                <img src="<?php echo esc_url($post['thumbnail']); ?>" alt="<?php echo esc_attr($post['title']); ?>">
                            <?php endif; ?>
                            <h4><?php echo esc_html($post['title']); ?></h4>
                            <p><?php echo esc_html($post['excerpt']); ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    endif;
} 