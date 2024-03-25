<?php 

/**
 * Template name: PDF Viewer / Video Embed
 */
get_header(); ?>

<?php
// Get the current post or page ID
$current_post_id = get_the_ID();

// Get the categories associated with the current post or page
$categories = get_the_category($current_post_id);

// Loop through the categories and get their IDs
$category_ids = array();
foreach ($categories as $category) {
    $category_ids[] = $category->slug;
}

// Output the category IDs (comma-separated)
$additional_classes = implode(' ', $category_ids);
?>
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
          <div class="col-12 <?php echo $additional_classes; ?>">
            <?php echo the_content(); ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>