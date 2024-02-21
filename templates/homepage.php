<?php 

/**
 * Template name: Homepage
 */
get_header()?>

<section class ="home-hero">
    <div class="home-hero">
        <div id="hero-container" class="hero-video-back">
            <video class="home-hero-video-back" muted loop autoplay playsinline>
                <source src="/wp-content/themes/interopx/assets/video/Interop_landing_page.mp4" type="video/mp4; codec='hvcl">
            </video>
            <div class="hero-content-container">
                <div class="hero-content">
                    <h1>CDR BEYOND BOUNDARIES CLOUD NATIVE, INTEROPERABLE, AUTO-SYNCING CDR FOR HEALTHCARE ENTERPRISES</h1>
                    <hr>
                    <span class="hero-text">Cras aliquam leo quis semper viverra. Fusce vel purus rhoncus, interdum ligula vel, cursus ipsum. Nullam massa elit, commodo id tincidunt id, tincidunt nec dui. Morbi iaculis venenatis sapien, eget mollis tellus gravida et.</span>
                </div>
                <div class="hero-content-bottom">
                     <p class="box-button">
                         <button id="show-video-btn" class="btn" >WATCH A SHORT VIDEO</button>
                     </p>
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