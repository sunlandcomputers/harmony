<?php

get_header(); ?>

<section class="single-column">

    <main id="main" class="main main-content">
        
        <?php 
        if ( have_posts() ) 
        { ?><h4>
            <?php 
            
            if ( is_category() ) {
                $atitle = single_cat_title( '', false );
            } elseif ( is_tag() ) {
                $atitle = single_tag_title( '', false );
            } elseif ( is_author() ) {
                $atitle = '<span class="vcard">' . get_the_author() . '</span>';
            } elseif ( is_post_type_archive() ) {
                $atitle = post_type_archive_title( '', false );
            } elseif ( is_tax() ) {
                $atitle = single_term_title( '', false );
            } else {
                $atitle = '';
            }
                echo esc_html( $atitle );   
            ?></h4>
            <?php
            // Start the loop.
            while ( have_posts() ) :
                the_post(); 

                    get_template_part( 'parts/excerpt' );
            ?>
            <?php 
            // End the loop.
            endwhile;
            ?>

            <div id="postPagination" class="post-navigation">
                <?php
                // Previous/next page navigation.
                the_posts_pagination( ); 
                ?>
            </div>

        <?php 
        } else { 
            get_template_part( 'parts/nocontent' );
            } ?>

    </main>
    
</section>

<?php get_footer(); ?>
