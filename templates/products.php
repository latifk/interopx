<?php 

/**
 * Template name: Products
 */
get_header();

?>

    <section class ="home-hero slider-home">
        <div class="container-fluid">
        <div class="home-hero products">
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
                    <div class="hero-content-bottom">
                        <a href="<?php echo get_field('hero_button_url'); ?>"><button class="btn"><?php echo get_field('hero_button_text'); ?></button></a>
                    </div>
                </div>
            </div>
            <div id="hero-video" class="hero-video">
                <span id="close-btn">&times;</span>
                <video id="video" controls class="home-hero-video">
                    <source src="/wp-content/uploads/2024/02/iX-DataBridge_V1.mp4" type="video/mp4; codec='hvcl">
                </video>
            </div>
        </div>
        </div>
    </section>
    <section class="boxes">
      <div class="container">
        <div class="row">
            <?php
            // The Query
            $args = array(
                'post_type' => 'product', // Replace 'your_custom_post_type' with the name of your custom post type
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