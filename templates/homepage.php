<?php 

/**
 * Template name: Homepage
 */
get_header();

if (!is_front_page()) {
    $video = 'Interop_Page 2_landing_Optimized.mp4';
    $show_button = false;
    $page_title = "IX Databridge - A Fully Automated Bi-Directional Data Exchange Solution";
    $subtitle = "Seamless Payer-Providers, Payer-Payer, Payer-Patients, Payer to Partners Interoperability";
}
else {
    $video = 'Interop_landing_page.mp4';
    $show_button = true;
    $page_title = "'Always Up to Date’ and ‘Always Available’ Clinical Encounter Data for Payers";
    $subtitle = "Seamless bi-directional data exchange between Payer-Providers, Payer-Payer, Payer-Patients";
}

?>

<section class ="home-hero slider-home">
    <div class="container-fluid">
<!--        <div class="row">-->
    <div class="home-hero">
        <div id="hero-container" class="hero-video-back">
            <video class="home-hero-video-back" muted loop autoplay playsinline>
                <source src="/wp-content/themes/interopx/assets/video/<?php echo $video; ?>" type="video/mp4; codec='hvcl">
            </video>
            <div class="hero-content-container">
                <div class="hero-content">
                    <h1><?php echo $page_title; ?></h1>
<!--                    <hr class = "line">-->
                    <span class="hero-text"><?php echo $subtitle; ?></span>
                </div>
                <?php if ($show_button) { ?>
                <div class="hero-content-bottom">
                     <p class="box-button">
                         <button id="show-video-btn" class="btn" >Watch a Short Video</button>
                     </p>
                </div>
                <?php } ?>
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