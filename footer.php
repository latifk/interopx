<footer>
      <div class="container">
        <div class="row">
          <div class="col-5">
            <h2>Let us connect</h2>
            <p class="footer-description">
              Enable your healthcare data for population health analytics, new
              clinical insights, and quality measure reporting.
            </p>
            <form class="footer-form">
              <div class="form-group">
                <input
                  type="text"
                  name="Name"
                  class="form-control"
                  placeholder="Name*"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  name="Email"
                  class="form-control"
                  placeholder="E-Mail*"
                  required
                />
              </div>
              <div class="form-group">
                <label>Your Message*</label>
                <textarea name="Message" rows="5" class="form-control" required></textarea>
              </div>
              <div class="form-button">
                <button class="btn g-recaptcha" 
    data-sitekey="6LedYqAlAAAAAHDWMlBF4sRh3Ja7AoSQD9aQQgzC" 
    data-callback='submitContactFooter' 
    data-action='submit'>Contact Us</button>
				  
              </div>
			  <p class="mail-response" style="margin: 2rem 0;text-align: left;color: #0e8af0;font-weight: bold;"></p>
            </form>
          </div>
          <div class="col-7">
            <div class="footer-menu">
			  <?php foreach(wp_get_menu_array('Main') as $menu) { if(!$menu['children']) continue; ?>
              <ul>
                 <li><a href="<?php echo $menu['url']; ?>"><?php echo $menu['title']; ?></a></li>
				 <?php foreach($menu['children'] as $child) { ?>
                 <li><a href="<?php echo $child['url']; ?>"><?php echo $child['title']; ?></a></li>
				 <?php } ?>
              </ul>
              <?php } ?>
              <div class="footer-socials">
                <p><i class="fa fa-facebook" aria-hidden="true"></i></p>
                <p><i class="fa fa-linkedin" aria-hidden="true"></i></p>
                <p><i class="fa fa-envelope-o" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <p>Copyright &copy; InteropX. All rights reserved. | Privacy Policy</p>
      </div>
    </footer>
    <?php wp_footer(); ?>
<script>
	
	// function submitForm(form) {
	// 	jQuery(form).on('submit', function(e) {
	// 		var contactForm = jQuery(this)[0];
	// 		var data = new FormData(contactForm);
	// 		e.preventDefault();
	// 		jQuery.ajax({
	// 			url:  '/wp-json/api/v1/sendMail',
	// 			data: data,
	// 			cache: false,
	// 			processData: false,
	// 			contentType: false,
	// 			type: 'POST',
	// 			success: function (data) {
	// 				var res = JSON.parse(JSON.stringify(data));
	// 				//$(contactForm).find(".form-button").hide();
	// 				$(contactForm)[0].reset();
	// 				$(contactForm).find(".mail-response").html(res.message).show();
	// 			}
	// 		});
	// 	});
	// 	jQuery(form).submit();
	// }

    // Handle form submission
    function submitForm(formSelector) {
        var form = document.querySelector(formSelector);
        var formData = new FormData(form);

        // Send the form data via AJAX
        jQuery.ajax({
            url: '/wp-json/api/v1/sendMail', // Ensure this matches your REST API endpoint
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === true) {
                    // Redirect to the thank you page
                    window.location.href = '/thankyou';
                } else {
                    // Show the error message
                    document.querySelector('.mail-response').innerHTML = response.message || 'An error occurred.';
                    document.querySelector('.mail-response').style.display = 'block';
                }
            },
            error: function(xhr, status, error) {
                // Handle general AJAX errors
                document.querySelector('.mail-response').innerHTML = 'An unexpected error occurred. Please try again.';
                document.querySelector('.mail-response').style.display = 'block';
                console.error('AJAX Error:', status, error); // Log errors for debugging
            }
        });
    }

function submitContact(token) {
    submitForm(".contact-page-form")
}
	
function submitContactFooter(token) {
    submitForm(".footer-form")
}

</script>
  </body>
</html>