<?php
/**
 * Harmony - content-none.php
 *
 * This template part based on Barista theme by Luthemes.
 *
 * @subpackage     Harmony/template-parts
 * @copyright      Copyright (C) 2016. Benjamin Lu
 * @license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (http://lumiathemes.com/)
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="content-title 404-page">
        <h2 class="content-archive">
            <?php if (is_404()) {
                esc_html_e('Page Not Available', 'harmony');
            } else if (is_search()) {
                ?><h2><?php esc_html_e('Nothing found for: ', 'harmony');?></h2>
                <p><?php get_search_query(); ?></p>
            <?php 
            } else {
                esc_html_e('Nothing Found', 'harmony');
            }
            ?>
        </h2>
    </header>
    <div class="entry-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php esc_html_e( 'Ready to publish your first post? ', 'harmony'); ?>
            <a href="<?php esc_url( admin_url( 'post-new.php' ) );?>"><?php esc_html_e('Get started here', 'harmony' ); 
            ?></a>
            </p>
        <?php elseif (is_404() ) : ?>
            <p><?php esc_html_e( 'You tried going to a page which does not exist. Check spelling or report a broken link to webmaster.', 'harmony');
            ?></p>
            <?php get_search_form(); ?>
        <?php elseif (is_search()) : ?>
            <p><?php esc_html_e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'harmony' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'harmony' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</article>

<div class="recent-posts">
    <?php if (is_404() || is_search()) { ?>
        <h3 class="recent-posts"><?php esc_html_e('Most Recent Posts', 'harmony'); ?></h3>
            <ul>
                <?php
                    $args = array('numberposts' => '10');
                    $recent_posts = wp_get_recent_posts($args);
                        foreach ($recent_posts as $recent) {
                            echo '<li><a href="' . esc_url( get_permalink($recent["ID"]) ) . '">' 
                            .  esc_attr( $recent["post_title"] ) .'</a> </li>';
                        }
                ?>
            </ul>
    <?php
    }
    ?>
</div>