<?php

/**
 * Template name: News
 */
get_header(); ?>


    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center"><?php echo the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="boxes light-bg">
        <div class="container">
            <div class="row">
                <?php
                // TO SHOW THE POST CONTENTS
                ?>
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $my_query = new WP_Query(); // I used a category id 1 as an example
                $my_query->query('posts_per_page=5&category_name=events' . '&paged='.$paged);
                ?>

                <?php if ( $my_query->have_posts() ) : ?>
                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="col-12 card-light">
                        <?php $feat_image_path = wp_get_attachment_url( get_post_thumbnail_id() );

                        $image_url = $feat_image_path; // Your image URL

                        // Get the path from the URL
                        $image_path = parse_url($image_url, PHP_URL_PATH);

                        // Construct the full path to the image file
                        $full_image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path;

                        // Check if the file exists
                        if ( has_post_thumbnail() && file_exists($full_image_path)) { ?>
                        <figure>
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                        <?php } ?>

                        <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
                        <?php echo the_excerpt(); ?>
                    </div>
                <?php endwhile; //resetting the post loop?>
                <?php
                    wp_reset_postdata(); //resetting the post query
                endif;
                ?>
                <?php if ($paged > 1) { ?>

                    <nav id="nav-posts">
                        <div class="prev"><?php next_posts_link('« Previous Posts'); ?></div>
                        <div class="next"><?php previous_posts_link('Newer Posts »'); ?></div>
                    </nav>

                <?php } else { ?>

                    <nav id="nav-posts">
                        <div class="prev"><?php next_posts_link('« Previous Posts'); ?></div>
                    </nav>

                <?php } ?>

            </div>
        </div>
    </section>

<?php get_footer(); ?>