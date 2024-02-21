<?php 

/**
 * Template name: PDF Viewer 
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
    <section class="pdf">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <?php echo the_content(); ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>