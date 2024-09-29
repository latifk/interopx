<?php 

/**
 * Template name: Contact
 */
get_header(); ?>

<section class="contact-hero">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="title"><?php echo the_title(); ?></h1>
            <div class="quick-contact">
              <p>
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <?php echo the_field('email'); ?>
              </p>
              <p>
                <i class="fa fa-phone" aria-hidden="true"></i> <?php echo the_field('phone'); ?>
              </p>
              <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo the_field('address'); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contact-form">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title">Message Us</h2>
            <form class="contact-page-form">
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
<!--                <div class="col-6">-->
<!--                  <input-->
<!--                    type="text"-->
<!--                    class="form-control"-->
<!--				 	name="Last name"-->
<!--                    placeholder="Last name*"-->
<!--                    required-->
<!--                  />-->
<!--                </div>-->
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
                <div class="col-12">
                  <div class="services-dropdown">
                    <label for="services">Requested Services</label>
                    <select name="Service" id="services" class="form-select">
                      <option value="Request for Demo">
                        Request for Demo
                      </option>
                      <option value="Request for More Information" selected>
                        Request for More Information
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label class="my-3">Your message</label>
                  <textarea
                    name="Message"
                    id=""
                    rows="5"
                    class="form-control"
                    placeholder="Enter your message here..."
                    style="resize: vertical;"
                  ></textarea>
                </div>
                <div class="contact-btn form-button">
                    <!--PROD CAPTCHA-UNCOMMENT BEFORE DEPLOYING-->
<!--                  <button class="btn g-recaptcha"-->
<!--                    data-sitekey="6LedYqAlAAAAAHDWMlBF4sRh3Ja7AoSQD9aQQgzC"-->
<!--                    data-callback='submitContact'-->
<!--                    data-action='submit'>Submit</button>-->
                    <!--LOCAL CAPTCHA-->
                    <button class="btn g-recaptcha"
                    data-sitekey="6LdYQ08qAAAAAOAQ2tuWSy5jFJRYmnHf0MQUYoiM"
                    data-callback='submitContact'
                    data-action='submit'>Submit</button>
                </div>
				<p class="mail-response" style="margin: 2rem 0;text-align: center;color: #0e8af0;font-weight: bold;"></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>