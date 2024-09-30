<?php 

/**
 * Template name: Solutions
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
      <figure class="figure-background">
        <?php require_once(get_template_directory() . '/assets/images/solutions-animation.svg'); ?>  
      </figure>
    </section>
    <section class="solutions-1" id="enterprise">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1><?php echo the_field('title_section_one'); ?></h1>
            <p>
              <?php echo the_field('description_section_one'); ?>
            </p>
            <a href="<?php echo the_field('button_url_section_one'); ?>"><p class="btn"><?php echo the_field('button_label_section_one'); ?></p></a>
          </div>
        </div>
      </div>
    </section>
    <section class="boxes light-bg">
      <div class="container">
        <div class="row">
          <div class="col-12" id="healthcare">
            <figure>
              <img
                src="<?php echo the_field("image_section_two"); ?>"
                alt=""
              />
            </figure>
            <h2>
              <?php echo the_field("title_section_two"); ?>
            </h2>
            <p>
              <?php echo the_field("description_section_two"); ?>
            </p>
            <p class="box-button"><a href="<?php echo the_field("button_url_section_two"); ?>"><?php echo the_field("button_label_section_two"); ?></a></p>
          </div>
          <div class="col-12" id="member">
            <div class="boxes-hero">
              <figure>
                <img
                  src="<?php echo get_field('image'); ?>"
                  alt=""
                />
              </figure>
              <div>
                <h2><?php echo the_field("title_section_three"); ?></h2>
                <p>
                  <?php echo the_field("description_section_three"); ?>
                </p>
              </div>

            </div>
            
            <div class="inner-box">
              <h2 class="title"><?php echo the_field('box_title_1'); ?></h2>
              <p class="description"><?php echo the_field('box_small_title_1'); ?></p>
              <p class="gradient-line"></p>
              <h2 class="title-1"><?php echo the_field('box_title_2'); ?></h2>
              <hr class="hr-style" />
              <h2 class="title-2"><?php echo the_field('box_title_3'); ?></h2>
              <div class="bubbles">
			  <?php foreach(get_field('bullet_list') as $bullet) { ?>
                <p><?php echo $bullet['text']; ?></p>
			  <?php } ?>
              </div>
              <p class="gradient-line"></p>
              <h2 class="title-3">
                <?php echo the_field('box_bottom_text'); ?>
              </h2>
            </div>
            <p class="box-button"><a href="<?php echo the_field('button_url_section_three'); ?>"><?php echo the_field('button_label_section_three'); ?></a></p>
          </div>
          <div class="col-12" id="electronic">
            <figure>
              <img src="<?php echo get_field('image_section_four'); ?>" alt="" />
            </figure>
            <h2>
              <?php echo the_field('title_section_four'); ?>
            </h2>
            <p>
              <?php echo the_field('description_section_four'); ?>
            </p>
            <figure>
              <img
                src="<?php echo get_field('big_image_section_four'); ?>"
                class="img-fluid content-img"
                alt=""
              />
            </figure>
            <p class="box-button"><a href="<?php echo get_field('button_url_section_four'); ?>"><?php echo get_field('button_label_section_four'); ?></a></p>
          </div>
		  
        </div>
      </div>
    </section>


<?php get_footer(); ?>