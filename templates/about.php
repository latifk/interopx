<?php 

/**
 * Template name: About
 */
get_header(); ?>

<section class="hero-about">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>About</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="about-section-1" id="mission-vision">
      <div class="container">
        <div class="row">
		  <?php foreach(get_field('boxes_section_one') as $box) { ?>
          <div class="col-6">
            <div class="mission-vission-box card-light">
              <figure>
                <img
                  src="<?php echo $box['image']; ?>"
                  class="img-fluid"
                  alt=""
                />
              </figure>
              <h2 class="title"><?php echo ucwords(strtolower($box['title'])); ?></h2>
              <p>
                <?php echo $box['description']; ?>
              </p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <section class="leadership" id="leadership">
      <div class="container">
        <div class="row">
          <h2 class="title"><?php echo the_field('title_team'); ?></h2>
        </div>
        <div class="row">
		  <?php foreach(get_field('team_members') as $member) { ?>
          <div class="col-6">
            <div class="leadership-box card-light">
              <figure>
                <img src="<?php echo $member['image']; ?>" alt="" />
                <a href="<?php echo $member['linkedin']; ?>" class="person-social-icon" target="_blank">
                  <img src="<?php echo get_template_directory_uri()?>/assets/images/linkedIN-person.png" alt="">
                </a>
              </figure>
              <div class="person-info">
                <h3><?php echo ucwords(strtolower($member['name'])); ?></h3>
                <p><?php echo $member['position']; ?></p>
                <p class="description">
                  <?php echo $member['description']; ?>
                </p>
              </div>
            </div>
          </div>
		  <?php } ?>
        </div>
      </div>
    </section>

    <section class="capabilities" id="capabilities">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title"><?php echo the_field('title_capabilities'); ?></h2>
          </div>
        </div>
        <div class="row">
		  <?php foreach(get_field('cards') as $card) { ?>
          <div class="col-6">
            <div class="capability-box card-light">
              <figure>
                <img src="<?php echo $card['icon']; ?>" alt="" />
              </figure>
              <h3><?php echo ucwords(strtolower($card['title'])); ?></h3>
              <p>
                <?php echo $card['description']; ?>
              </p>
            </div>
          </div>
		  <?php } ?>
        </div>
      </div>
    </section>

    <section class="about-last">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title">
              <?php echo ucwords(strtolower(the_field('title_bottom'))); ?>
            </h2>
            <ul>
			  <?php foreach(get_field('bullets_bottom') as $bullet) { ?>
              <li><?php echo $bullet['text']; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>