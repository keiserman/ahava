<?php
/**
 * Template functions for Ahava Medical theme
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Get the post thumbnail URL
 *
 * @param string $size The image size to retrieve.
 * @return string The thumbnail URL.
 */
function ahava_get_thumbnail_url($size = 'full') {
    if (has_post_thumbnail()) {
        return get_the_post_thumbnail_url(get_the_ID(), $size);
    }
    return get_template_directory_uri() . '/assets/images/placeholder.jpg';
}

/**
 * Get the post excerpt
 *
 * @param int $length The excerpt length.
 * @return string The excerpt.
 */
function ahava_get_excerpt($length = 25) {
    $excerpt = get_the_excerpt();
    if (empty($excerpt)) {
        $excerpt = get_the_content();
    }
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $length);
    return substr($excerpt, 0, strrpos($excerpt, ' ')) . '...';
}

/**
 * Get the post categories
 *
 * @return array The categories.
 */
function ahava_get_categories() {
    $categories = get_the_category();
    if (empty($categories)) {
        return array();
    }
    return array_map(function($category) {
        return array(
            'name' => $category->name,
            'url' => get_category_link($category->term_id),
        );
    }, $categories);
}

/**
 * Get the post tags
 *
 * @return array The tags.
 */
function ahava_get_tags() {
    $tags = get_the_tags();
    if (empty($tags)) {
        return array();
    }
    return array_map(function($tag) {
        return array(
            'name' => $tag->name,
            'url' => get_tag_link($tag->term_id),
        );
    }, $tags);
}

/**
 * Get the post meta
 *
 * @return array The post meta.
 */
function ahava_get_post_meta() {
    return array(
        'author' => get_the_author(),
        'date' => get_the_date(),
        'time' => get_the_time(),
        'comments' => get_comments_number(),
    );
}

/**
 * Get the post navigation
 *
 * @return array The navigation links.
 */
function ahava_get_post_navigation() {
    return array(
        'prev' => get_previous_post_link('%link', '&larr; %title'),
        'next' => get_next_post_link('%link', '%title &rarr;'),
    );
}

/**
 * Get the post pagination
 *
 * @return string The pagination HTML.
 */
function ahava_get_pagination() {
    return paginate_links(array(
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'type' => 'list',
    ));
}

/**
 * Get the post comments
 *
 * @return array The comments.
 */
function ahava_get_comments() {
    $comments = get_comments(array(
        'post_id' => get_the_ID(),
        'status' => 'approve',
        'order' => 'ASC',
    ));
    
    return array_map(function($comment) {
        return array(
            'author' => $comment->comment_author,
            'date' => get_comment_date('', $comment),
            'content' => $comment->comment_content,
            'avatar' => get_avatar_url($comment->user_id),
        );
    }, $comments);
}

/**
 * Get the post related posts
 *
 * @param int $count The number of related posts to get.
 * @return array The related posts.
 */
function ahava_get_related_posts($count = 3) {
    $categories = get_the_category();
    if (empty($categories)) {
        return array();
    }
    
    $category_ids = array_map(function($category) {
        return $category->term_id;
    }, $categories);
    
    $related_posts = get_posts(array(
        'category__in' => $category_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => $count,
    ));
    
    return array_map(function($post) {
        return array(
            'title' => $post->post_title,
            'url' => get_permalink($post->ID),
            'thumbnail' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
            'excerpt' => ahava_get_excerpt(20),
        );
    }, $related_posts);
} 