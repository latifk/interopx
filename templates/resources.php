<?php 

/**
 * Template name: Resources
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
    <section class="boxes light-bg">
      <div class="container">
        <div class="row">
          <?php foreach(get_field('boxes') as $box) { ?>
          <div class="col-12">
            <figure>
              <img
                src="<?php echo $box['image']; ?>"
                alt=""
              />
            </figure>
            <h2><?php echo $box['title']; ?></h2>
            <?php echo $box['description']; ?>
            <p class="box-button <?php echo (count($box['buttons']) >=2 ? 'double-btn' : ''); ?>">
			  <?php foreach($box['buttons'] as $button) { ?>
              <a href="<?php echo $button['url']; ?>" style="color: inherit"><?php echo $button['label']; ?></a>
			  <?php } ?>
            </p>
          </div>
			<?php } ?>
        </div>
      </div>
    </section>

<?php get_footer(); ?>