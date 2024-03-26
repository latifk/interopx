<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package YourThemeName
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            // Start the loop.
            while ( have_posts() ) :
                the_post();

                $image_url = wp_get_attachment_url( get_post_thumbnail_id() ); // Your image URL

                // Get the path from the URL
                $image_path = parse_url($image_url, PHP_URL_PATH);

                // Construct the full path to the image file
                $full_image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path;

                // Display the post featured image if it exists.
                if ( has_post_thumbnail() && file_exists($full_image_path)) { ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php } ?>
                <section id="post-<?php the_ID(); ?>" class="post-boxes boxes light-bg">
                <div class="post container">
                    <h1><?php echo the_title(); ?></h1>
                    <div class="row">
                    <div class="col-12 card-light">
                        <?php
                        // Display the post content.
                        the_content();
                        ?>
                    </div>
                    </div>
                </div>
                </section>
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                // End the loop.
            endwhile;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>