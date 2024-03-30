<?php 

/**
 * Template name: Homepage
 */
get_header();
?>

<section class ="home-hero slider-home">
    <div class="container-fluid">
    <div class="home-hero frontpage">
        <div id="hero-container" class="hero-video-back">
            <div class="video-container">
                <video class="home-hero-video-back" muted loop autoplay playsinline>
                    <source src="<?php echo get_field('video'); ?>" type="video/mp4; codec='hvcl">
                </video>
            </div>
            <div class="hero-content-container">
                <div class="hero-content">
                    <div class="heto-title">
                        <h1><?php echo get_field('hero_title'); ?></h1>
                    </div>
                    <div class="heto-subtitle">
                        <span class="hero-text"><?php echo get_field('hero_subtitle'); ?></span>
                    </div>
                </div>
                <?php if ( get_field('hero_button_video') ) { ?>
                <div class="hero-content-bottom">
                     <p class="box-button">
                         <button id="show-video-btn" class="btn" ><?php echo get_field('hero_button_text'); ?></button>
                     </p>
                </div>
                <?php } ?>
            </div>
        </div>
        <div id="hero-video" class="hero-video">
            <span id="close-btn">&times;</span>
            <video id="video" controls class="home-hero-video">
                <source src="<?php echo get_field('hero_button_video'); ?>" type="video/mp4; codec='hvcl">
            </video>
        </div>
    </div>

    <?php
        // Specify the post ID you want to retrieve
        $featured_post_id = get_field('featured_post');
        if (isset($featured_post_id) && !empty($featured_post_id)) {
            $box_class = "frontpage-with-featured";
    ?>
    <div class="featured-news">
        <?php
        // Specify the post ID you want to retrieve
        $featured_post_id = get_field('featured_post'); // Replace 123 with the actual post ID you want to retrieve

        // Retrieve the post object by its ID
        $featured_post = get_post($featured_post_id);
        $post_title = $featured_post->post_title;
        $post_content = $featured_post->post_content;
        // Retrieve the value of the "Teaser" custom field
        $teaser_value = get_post_meta($featured_post_id, '_teaser_key', true);
        // Get the excerpt of the specified post
        $post_excerpt = get_the_excerpt($featured_post_id);
        ?>
        <div class="col-12 featured-card">
            <div class="featured-card-content">
                <h2><?php echo $post_title; ?></h2>
                <h5><?php echo wpautop($teaser_value); ?></h5>
            </div>
            <div class="featured-card-btn">
                <p class="box-button">
                    <a href="<?php the_permalink($featured_post_id); ?>">Read More</a>
                </p>
            </div>
        </div>
        <?php } else {
            $box_class = "frontpage-no-featured";
         } ?>
    </div>
    </div>
</section>
    <section class="boxes <?php echo $box_class; ?>">
      <div class="container">
        <div class="row">
            <?php
            // The Query
            $args = array(
                'post_type' => 'home-item', // Replace 'your_custom_post_type' with the name of your custom post type
                'posts_per_page' => -1, // Set the number of posts you want to retrieve. Use -1 to retrieve all posts.
                'order' => 'ASC' // Order posts in ascending order
            );
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    // Output your post content here
                    foreach (get_field('boxes') as $box) {
                        ?>
                        <div class="col-12 card" id="<?php echo $box['scroll_id']; ?>">
                            <div class="card-image">
                                <figure>
                                    <img
                                            src="<?php echo $box['image']; ?>"
                                            alt=""
                                    />
                                </figure>
                            </div>
                            <div class="card-content">
                                <h2><?php echo $box['title']; ?></h2>
                                <p><?php echo $box['description']; ?></p>
                                <p class="box-button">
                                    <a href="<?php echo $box['button_url']; ?>"><?php echo $box['button_label']; ?></a>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            } else {
                // no posts found
            }
            ?>
        </div>
      </div>
    </section>

<?php get_footer()?>