<?php 

/**
 * Template name: Use Cases
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
    <section class="solutions-hero">
        <figure style="background: white">
            <?php require_once(get_template_directory() . '/assets/images/solutions-animation.svg'); ?>
        </figure>
    </section>
<?php
// The Query to get the use-case posts that marked "at the top"
$args = array(
    'post_type' => 'use-case', // Replace 'your_custom_post_type' with the name of your custom post type
    'posts_per_page' => -1, // Set the number of posts you want to retrieve. Use -1 to retrieve all posts.
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'always_at_the_top',
            'value' => '1',
            'compare' => '==' // not really needed, this is the default
        )
    )
);
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            // Output your post content here
                foreach (get_field('boxes') as $box) {
                    ?>
                    <section class="solutions-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h1><?php echo strtoupper($box['title']); ?></h1>
                                    <p>
                                        <?php echo $box['description']; ?>
                                    </p>
                                    <?php foreach($box['buttons'] as $button) { ?>
                                        <a href="<?php echo $button['url']; ?>"><p class="btn"><?php echo $button['label']; ?></p></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                }
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        // no posts found
    }
    ?>


    <?php
    // The Query to get the use-case posts that are NOT marked "at the top"
    $args = array(
        'post_type' => 'use-case', // Replace 'your_custom_post_type' with the name of your custom post type
        'posts_per_page' => -1, // Set the number of posts you want to retrieve. Use -1 to retrieve all posts.
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'always_at_the_top',
                'value' => '0',
                'compare' => '==' // not really needed, this is the default
            )
        )
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
            foreach (get_field('boxes') as $box2) {
         ?>
                    <div class="col-12 card-light">
                        <?php if( $box2['image']) { ?>
                            <figure>
                                <img
                                        src="<?php echo $box2['image']; ?>"
                                        alt=""
                                />
                            </figure>
                        <?php } ?>
                        <h2><?php echo $box2['title']; ?></h2>
                        <?php echo $box2['description']; ?>
                        <p class="box-button <?php echo (count($box2['buttons']) >=2 ? 'double-btn' : ''); ?>">
                            <?php foreach($box2['buttons'] as $button) { ?>
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