<?php 

/**
 * Template name: Register to watch
 */
get_header();

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
          <div class="col-6">
              <h1>Introducing iX DataBridge</h1>
              <p class="desc-text">X DataBridge seamlessly delivers clinical records including CCD-A to the Health Plan’s data repository in the desired target format ensuring immediate availability of the data for analysis, risk adjustment, and care gap closure. Instead of scrambling for patient records, Health Plans can rely on iX DataBridge to cost-effectively create an authoritative source of clinical encounter data for the entire patient population. Configure iX DataBridge once, and it will automatically keep your clinical data repository up to date.</p>
          </div>
          <div class="col-6">
            <h2 class="title">Watch Now</h2>
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
                <div class="contact-btn form-button">
                    <!--PROD CAPTCHA-UNCOMMENT BEFORE DEPLOYING-->
<!--                  <button class="btn g-recaptcha"-->
<!--                    data-sitekey="6LedYqAlAAAAAHDWMlBF4sRh3Ja7AoSQD9aQQgzC"-->
<!--                    data-callback='submitRegister'-->
<!--                    data-action='submit'>Watch Now</button>-->
                    <!--LOCAL and STAGE CAPTCHA-->
                    <button class="btn g-recaptcha"
                    data-sitekey="6LdYQ08qAAAAAOAQ2tuWSy5jFJRYmnHf0MQUYoiM"
                    data-callback='submitRegister'
                    data-action='submit'>Watch Now</button>
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