<?php
/**
 * The template for displaying all single insight posts
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
                            <?php
                            // Display the post content.
                            the_content();
                            // Output your post content here
                            foreach (get_field('boxes') as $box) {
                                ?>
                                <div class="col-12 card-light">
                                    <?php if( $box['image']) { ?>
                                        <figure>
                                            <img
                                                    src="<?php echo $box['image']; ?>"
                                                    alt=""
                                            />
                                        </figure>
                                    <?php } ?>
                                    <?php echo $box['description']; ?>
                                    <p class="box-button <?php echo (count($box['buttons']) >=2 ? 'double-btn' : ''); ?>">
                                        <?php foreach($box['buttons'] as $button) { ?>
                                            <a href="<?php echo $button['url']; ?>" style="color: inherit"><?php echo $button['label']; ?></a>
                                        <?php } ?>
                                    </p>
                                </div>
                                <?php
                            }
                            ?>
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