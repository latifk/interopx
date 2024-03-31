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
<!--                <div class="col-md-8">-->
                <?php
                // TO SHOW THE POST CONTENTS
                ?>
                <?php

                // Define your query arguments
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'category_name' => 'events', // Adjust post type if needed
                    'posts_per_page' => 5,
                    'paged' => $paged
                );
                // Instantiate a new query
                $my_query = new WP_Query($args);
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
                        <div class="card-image">
                        <figure>
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                        </div>
                        <?php } ?>
                        <div class="card-content">
                        <h2><?php the_title(); ?></h2>
                            <div class="post-date">
                                <?php
                                $post_date = get_post_datetime(get_the_ID());
                                echo $post_date->format('F j, Y');
                                ?>
                            </div>
                        <?php echo the_excerpt(); ?>
                        <p class="box-button">
                           <a href="<?php the_permalink(); ?>" style="color: inherit">Read More</a>
                        </p>

                        </div>
                    </div>
                <?php endwhile; ?>

                <div class="pagination">
                    <?php // Pagination
                    echo paginate_links(array(
                    'total' => $my_query->max_num_pages
                    ));
                    ?>
                </div>

                <?php
                // Restore original post data
                wp_reset_postdata(); //resetting the post query

                else : ?>
                    <div class="col-12 card-light no-posts-found">
                        <?php echo 'No posts found'; // If no posts found ?>
                    </div>
                <?php endif; ?>
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <aside class="sidebar">-->
<!--                        <h2>Resources</h2>-->
<!--                        <ul>-->
<!--                            <li>Sidebar Item 1</li>-->
<!--                            <li>Sidebar Item 2</li>-->
<!--                            <li>Sidebar Item 3</li>-->
<!--                        </ul>-->
<!--                    </aside>-->
<!--                </div>-->
            </div>
        </div>
    </section>

<?php get_footer(); ?>