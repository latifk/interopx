<?php 

/**
 * Template name: Homepage
 */
get_header();
$current_url = home_url($_SERVER['REQUEST_URI']);

//if (strpos($current_url, '/products/') !== false) {
if (is_front_page()) {
    $video_back = '/wp-content/themes/interopx/assets/video/Interop_Page 2_landing_Optimized.mp4';
    $show_button = false;
    $title = "'Always Up to Date’ and ‘Always Available’ Clinical Encounter Data for Payers";
    $subtitle = "Seamless bi-directional data exchange between Payer-Providers, Payer-Payer, Payer-Patients";
} 
else
{
    $video_back = '/wp-content/themes/interopx/assets/video/Interop_landing_page.mp4';
    $show_button = true;
    $title = "IX Databridge - A Fully Automated Bi-Directional Data Exchange Solution";
    $subtitle = "Seamless Payer-Providers, Payer-Payer, Payer-Patients, Payer to Partners Interoperability";
}

?>

<section class ="home-hero">
    <div class="home-hero">
        <div id="hero-container" class="hero-video-back">
            <video class="home-hero-video-back" muted loop autoplay playsinline>
                <source src="<?php echo $video_back; ?>" type="video/mp4; codec='hvcl">
            </video>
            <div class="hero-content-container">
                <div class="hero-content">
                    <h1>'<?php echo $title; ?></h1>
                    <hr>
                    <span class="hero-text"><?php echo $subtitle; ?></span>
                </div>
                <div class="hero-content-bottom">
                     <p class="box-button">
                         <button id="show-video-btn" class="btn" >Learn How</button>
                     </p>
                </div>
            </div>
        </div>
        <?php if ($show_button) { ?>
        <div id="hero-video" class="hero-video">
            <span id="close-btn">&times;</span>
            <video id="video" controls class="home-hero-video">
                <source src="/wp-content/uploads/2024/02/iX-DataBridge_V1.mp4" type="video/mp4; codec='hvcl">
            </video>
        </div>
        <?php } ?>
    </div>
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
<!--                    </h1>-->
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
			<?php foreach(get_field('boxes') as $box) { ?>
          <div class="col-12" id="<?php echo $box['scroll_id']; ?>">
            <figure>
              <img
                src="<?php echo $box['image']; ?>"
                alt=""
              />
            </figure>
            <h2><?php echo $box['title']; ?></h2>
            <p><?php echo $box['description']; ?></p>
            <p class="box-button">
              <a href="<?php echo $box['button_url']; ?>"><?php echo $box['button_label']; ?></a>
            </p>
          </div>
			<?php } ?>
        </div>
      </div>
    </section>

<?php get_footer()?>