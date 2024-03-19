<?php 

/**
 * Template name: Resources
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

<?php
// The Query to get the use-case posts that are NOT marked "at the top"
$args = array(
    'post_type' => 'insight', // Replace 'your_custom_post_type' with the name of your custom post type
    'posts_per_page' => -1, // Set the number of posts you want to retrieve. Use -1 to retrieve all posts.
    'order' => 'ASC'
);
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    ?>
    <section class="boxes light-bg">
        <div class="container">
            <div class="row">

                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
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
                            <h2><?php echo $box['title']; ?></h2>
                            <?php echo $box['description']; ?>
                            <p class="box-button <?php echo (count($box['buttons']) >=2 ? 'double-btn' : ''); ?>">
                                <?php foreach($box['buttons'] as $button) { ?>
                                    <a href="<?php echo $button['url']; ?>" style="color: inherit"><?php echo $button['label']; ?></a>
                                <?php } ?>
                            </p>
                        </div>
                        <?php
                    }
                }

                ?>
            </div>
        </div>
    </section>
    <?php
    /* Restore original Post Data */
    wp_reset_postdata();
} else {
    // no posts found
}
?>

<?php get_footer(); ?>