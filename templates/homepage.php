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
    </div>
<!--    </div>-->
</section>
<!--<section class="slider-home">-->
<!--      <div class="container-fluid">-->
<!--        <div class="row">-->
<!--          <div class="swiper">-->
<!--            <div class="swiper-wrapper">-->
<!--			--><?php //foreach(get_field('slider') as $key => $slide) { ?>
<!--              <div class="swiper-slide">-->
<!--                <div class="col-6">-->
<!--                  <div class="slider-info">-->
<!--                    <h1>-->
<!--                      --><?php //echo $slide['title']; ?>
<!--                    <p>-->
<!--                      --><?php //echo $slide['description']; ?>
<!--                    </p>-->
<!--                    <a-->
<!--                      href="--><?php //echo $slide['button_url']; ?><!--"-->
<!--                      ><button class="btn">--><?php //echo $slide['button_label']; ?><!--</button></a-->
<!--                    >-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="col-6">-->
<!--                  <figure>-->
<!--                    --><?php //if($key == 0) {
//					require_once(get_template_directory() . '/assets/images/home-animation.svg');
//					} else { ?>
<!--					  <img src="--><?php //echo $slide['image']; ?><!--" class="img-fluid" />-->
<!--					  --><?php //} ?>
<!--                  </figure>-->
<!--                </div>-->
<!--              </div>-->
<!--				--><?php //} ?>
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="swiper-pagination"></div>-->
<!--    </section>-->

    <section class="boxes">
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