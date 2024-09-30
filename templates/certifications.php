<?php 

/**
 * Template name: Certifications
 */
get_header(); ?>

<section class="standards-hero">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1><?php echo strtoupper(get_the_title()); ?></h1>
          </div>
        </div>
      </div>
    </section>
    <section class="standard-boxes">
      <div class="container">
        <div class="row">
          <div class="col-12" id="cms">
            <h2 class="main-title"><?php echo the_field('title_section_one'); ?></h2>
            <p class="main-description">
              <?php echo the_field('description_section_one'); ?>
            </p>
            <div class="box">
              <div class="col-6">
                <figure>
                  <img
                    src="<?php echo the_field('small_image_section_one'); ?>"
                    class="img-fluid box-hero-image"
                    alt=""
                  />
                </figure>
                <h2>
                  <?php echo the_field('second_title_section_one'); ?>
                </h2>
                <ul>
				<?php foreach(get_field('bullets_section_one') as $bullet) { ?>
                  <li><?php echo $bullet['text']; ?></li>
				<?php } ?>
                </ul>
              </div>
              <div class="col-6">
                <figure>
                  <img
                    src="<?php echo get_field('image_section_one'); ?>"
                    class="img-fluid"
                    alt=""
                  />
                </figure>
              </div>
            </div>
          </div>
          <div class="col-12" id="certification">
            <h2 class="main-title">
              <?php echo the_field('title_section_two'); ?>
            </h2>
            <p class="main-description">
              <?php echo the_field('description_section_two'); ?>
            </p>
            <div class="box">
              <div class="col-6">
                <figure>
                  <img
                    src="<?php echo the_field('small_image_section_two'); ?>"
                    class="img-fluid box-hero-image"
                    alt=""
                  />
                </figure>
                <h2>
                  <?php echo the_field('second_title_section_two'); ?>
                </h2>
                <ul>
				<?php foreach(get_field('bullets_section_two') as $bullet) { ?>
                  <li><?php echo $bullet['text']; ?></li>
				<?php } ?>
                </ul>
              </div>
              <div class="col-6">
                <figure>
                  <img src="<?php echo get_field('image_section_two'); ?>" class="img-fluid" alt="" />
                </figure>
              </div>
            </div>
          </div>
          <div class="col-12 mb-5" id="disclosures">
            <h2 class="main-title"><?php echo the_field('title_section_three'); ?></h2>
            <p>
              <?php echo the_field('description_section_three'); ?>
            </p>
            <p class="box-button"><a href="<?php echo the_field('button_url_section_three'); ?>"><?php echo the_field('button_label_section_three'); ?></a></p>
          </div>
		  <div class="col-12" id="testing">
            <div class="box testing-box">
              <div class="col-6">
                <figure>
                  <img
                    src="<?php echo get_field('image_section_four'); ?>"
                    class="img-fluid box-hero-image"
                    alt=""
                  />
                </figure>
              </div>
              <div class="col-6">
                <h2>
                  <?php echo the_field('title_section_four'); ?>
                </h2>
                <p>
                  <?php echo the_field('description_section_four'); ?>
                </p>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Calendar Year</th>
                  <th scope="col">Real World Testing Plan</th>
                  <th scope="col">Real World Testing Results</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach(get_field('table_section_four') as $table) { ?>
                <tr>
                  <td><?php echo $table['calendar_year']; ?></td>
                  <td><a class="text-decoration-none" href="<?php echo $table['real_world_testing_plan']['url']; ?>" ><?php echo $table['real_world_testing_plan']['title']; ?></a></td>
                  <td><?php echo $table['real_world_testing_results']; ?></td>
                </tr>
				<?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>