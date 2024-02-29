<?php 

/**
 * Template name: Use Cases
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
        <figure style="background: white">
            <?php require_once(get_template_directory() . '/assets/images/solutions-animation.svg'); ?>
        </figure>
    </section>
<?php foreach(get_field('boxes') as $key => $box) { ?>
    <?php if ($key == 0) { ?>
    <section class="solutions-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo $box['title']; ?></h1>
                    <p>
                        <?php echo $box['description']; ?>
                    </p>
                    <?php foreach($box['buttons'] as $button) { ?>
                        <a href="<?php echo $button['url']; ?>"><p class="btn"><?php echo $button['label']; ?></p></a>
                     <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
<?php } ?>
    <section class="boxes light-bg">
      <div class="container">
        <div class="row">
          <?php foreach(get_field('boxes') as $key => $box) { ?>

          <?php if ($key > 0) { ?>
          <div class="col-12 card-light">
            <?php if( $box['image']) { ?>
            <figure>
              <img
                src="<?php echo $box['image']; ?>"
                alt=""
              />
            </figure>
            <?php } ?>
            <h2><?php echo $box['title']; ?></h2>
            <?php echo $box['description']; ?>
            <p class="box-button <?php echo (count($box['buttons']) >=2 ? 'double-btn' : ''); ?>">
			  <?php foreach($box['buttons'] as $button) { ?>
              <a href="<?php echo $button['url']; ?>" style="color: inherit"><?php echo $button['label']; ?></a>
			  <?php } ?>
            </p>
          </div>
          <?php } ?>
			<?php } ?>
        </div>
      </div>
    </section>

<?php get_footer(); ?>