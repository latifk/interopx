<?php 

/**
 * Template name: Register to watch
 */
get_header();

$title = "iX DataBridge Enables Health Plans to";
$subtitle = "";
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
              <?php if (strlen($subtitle) > 0) { ?>
                  <h2><?php echo $subtitle ?></h2>
              <?php } ?>
              <p class="desc-text">
                  <!--                  Request our white papers and schedule a 30-minute exploratory call with our experts. Give us a chance to show you how we can boost your Medicare Advantage VBC Contracts operations.-->
              <ul>
                  <li class="desc-text">Acquire Complete and Always Up-to-Date Clinical Data for the Patient Population, and</li>
                  <li class="desc-text">Non-Intrusively Implement Fully Compliant CMS-0057 Final Rule Provisions</li>
              </ul>
              </p>
          </div>
          <div class="col-5">
            <h2 class="title">Watch Now</h2>
              <p class="desc-text">
<!--                  Please provide your name and email below to access our <strong>exclusive video</strong> and explore how iX DataBridge transforms data accessibility for payers.-->
                  Please provide your name and email below to access our white papers and <span class="no-wrap-text">iX DataBridge</span> video by sharing your contact information
              </p>
            <form class="register-page-form">
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
                <!-- Hidden Field -->
                <input type="hidden" name="source" value="video_registration" />
                <div class="contact-btn form-button">
                <?php
                if( $_SERVER['SERVER_NAME'] == 'interopx.com') { ?>
                    <!--PROD CAPTCHA-UNCOMMENT BEFORE DEPLOYING-->
                    <button class="btn g-recaptcha"
                    data-sitekey="6LedYqAlAAAAAHDWMlBF4sRh3Ja7AoSQD9aQQgzC"
                    data-callback='submitRegister'
                    data-action='submit'>Watch Now</button>
                <?php } else { ?>
                    <!--LOCAL and STAGE CAPTCHA-->
                    <button class="btn g-recaptcha "
                    data-sitekey="6LdYQ08qAAAAAOAQ2tuWSy5jFJRYmnHf0MQUYoiM"
                    data-callback='submitRegister'
                    data-action='submit'>Watch Now</button>
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