<?php 

/**
 * Template name: White Papers Registration
 */
get_header();

// Get the value of 'wid' from the URL
$wid_value = isset($_GET['wid']) ? $_GET['wid'] : ''; // Default to empty if not set
// Replace all dashes with spaces
$wid_name = str_replace('-', ' ', $wid_value);

// Capitalize the first letter of each word
$wid_name= ucwords($wid_name);
$title = "";
$subtitle = "";
if ($wid_value == "cms-0057f-white-paper") {
    $wid = 'getting-your-cms-0057-f-implementation-right';
    $title = "Getting your CMS-0057-F Implementation Right";
    $subtitle = "Access our CMS-0057-F White Paper by sharing your contact information";
}
else if ($wid_value == "complete-data-white-paper") {
    $wid = 'complete-data-is-the-key-to-streamlining-medicare-advantage-operations';
    $title = "Complete Data is the Key to Streamlining Medicare Advantage Operations";
    $subtitle = "Access our Complete and always up-to-date Data White Paper by sharing your contact information";
}
?>

<!--<section class="contact-hero">-->
<!--      <div class="container">-->
<!--        <div class="row">-->
<!--          <div class="col-12">-->
<!--            <h1 class="title">--><?php //echo the_title(); ?><!--</h1>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->

    <section class="contact-form register-form">
      <div class="container">
        <div class="row">
          <div class="col-7">
              <h1><?php echo $title ?></h1>
              <h2><?php echo $subtitle ?></h2>
              <p class="desc-text">
                  Request our white papers and schedule a 30-minute exploratory call with our experts. Give us a chance to show you how we can boost your Medicare Advantage VBC Contracts operations.
              </p>
          </div>
          <div class="col-5">
            <h2 class="title">View Now</h2>
              <p class="desc-text">
                  Please provide your name and email below to access our <strong><?php echo $wid_name ?></strong> and explore how iX DataBridge transforms data accessibility for payers.
              </p>
            <form class="wp-register-page-form">
              <div class="row">
                <div class="col-12">
                  <input
                    type="text"
                    class="form-control"
					name="Name"
                    placeholder="Name*"
                    required
                  />
                </div>
                <div class="col-12">
                  <input
                    type="text"
                    class="form-control"
					name="Company"
                    placeholder="Company"
                  />
                </div>
                <div class="col-12">
                  <input
                    type="email"
                    class="form-control"
					name="Email"
                    placeholder="E-Mail*"
                    required
                  />
                </div>
                <!-- Hidden Fields -->
                <input type="hidden" name="source" value="whitepapers_registration" />
                <input type="hidden" name="whitepaper_id" value="<?php echo esc_attr($wid_value); ?>"" />
                <input type="hidden" name="whitepaper_pdf_url" value="<?php echo esc_attr($wid); ?>"" />
                <div class="contact-btn form-button">
                <?php
                if( $_SERVER['SERVER_NAME'] == 'interopx.com') { ?>
                    <!--PROD CAPTCHA-UNCOMMENT BEFORE DEPLOYING-->
                    <button class="btn g-recaptcha"
                    data-sitekey="6LedYqAlAAAAAHDWMlBF4sRh3Ja7AoSQD9aQQgzC"
                    data-callback='submitWPRegister'
                    data-action='submit'>View Now</button>
                <?php } else { ?>
                    <!--LOCAL and STAGE CAPTCHA-->
                    <button class="btn g-recaptcha "
                    data-sitekey="6LdYQ08qAAAAAOAQ2tuWSy5jFJRYmnHf0MQUYoiM"
                    data-callback='submitWPRegister'
                    data-action='submit'>View Now</button>
                <?php } ?>
                </div>
                  <p class="mail-response"></p>
                  <!--				<p class="mail-response" style="margin: 2rem 0;text-align: center;color: #0e8af0;font-weight: bold;"></p>-->
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>