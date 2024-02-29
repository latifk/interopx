<?php 

/**
 * Template name: Products
 */
get_header();

$page_class = "products";
$video = 'Interop_Page 2_landing_Optimized.mp4';
$show_button = true;
$page_title = "iX DataBridge – A Fully Automated Bi-Directional Data Exchange Solution";
$subtitle = "Seamless Payer-Providers, Payer-Payer, Payer-Patients, Payer to Partners Interoperability";
?>

    <section class ="home-hero slider-home">
        <div class="container-fluid">
        <div class="home-hero <?php echo $page_class ?>">
            <div id="hero-container" class="hero-video-back">
                <div class="video-container">
                    <video class="home-hero-video-back" muted loop autoplay playsinline>
                        <source src="/wp-content/themes/interopx/assets/video/<?php echo $video; ?>" type="video/mp4; codec='hvcl">
                    </video>
                </div>
                <div class="hero-content-container">
                    <div class="hero-content">
                        <div cladd="heto-title">
                            <h1><?php echo $page_title; ?></h1>
                        </div>
                        <div cladd="heto-subtitle">
                            <span class="hero-text"><?php echo $subtitle; ?></span>
                        </div>
                    </div>
                    <div class="hero-content-bottom">
                        <a href="/products/#automated"><button class="btn"><?php echo "Learn How"; ?></button></a>
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
			<?php foreach(get_field('boxes') as $box) { ?>
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
			<?php } ?>
        </div>
      </div>
    </section>

<?php get_footer()?>