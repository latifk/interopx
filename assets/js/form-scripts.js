function submitForm(formSelector) {
    var form = document.querySelector(formSelector);
    var formData = new FormData(form);
    var isValid = true; // Flag to track form validity
    var errorMessage = ''; // To accumulate error messages
    // Check if 'whitepaper_id' exists in the form data, if not set it to an empty string
    var whitepaperId = formData.has('whitepaper_id') ? formData.get('whitepaper_id') : '';


    // Clear previous error highlights and messages
    Array.from(form.elements).forEach(function(element) {
        element.classList.remove('error-highlight'); // Remove highlight class
        var errorSpan = element.parentNode.querySelector('.error-message');
        if (errorSpan) {
            errorSpan.remove(); // Remove existing error message
        }

        // Add input event listener to required fields
        if (element.hasAttribute('required')) {
            element.addEventListener('input', function() {
                // Remove the error message when the user starts typing
                var errorSpan = element.parentNode.querySelector('.error-message');
                if (errorSpan) {
                    errorSpan.remove();
                    element.classList.remove('error-highlight'); // Optionally remove highlight
                }
            });
        }
    });

    // Validate required fields
    Array.from(form.elements).forEach(function(element) {
        if (element.hasAttribute('required') && !element.value.trim()) {
            isValid = false;
            errorMessage += `${element.name} is required.<br>`; // Customize message as needed

            // Highlight the field
            element.classList.add('error-highlight');

            // Create an error message span
            var errorSpan = document.createElement('span');
            errorSpan.className = 'error-message';
            errorSpan.style.color = 'red'; // Set text color to red
            errorSpan.innerText = `${element.name} is required.`;
            element.parentNode.insertBefore(errorSpan, element.nextSibling); // Insert message after the field
        }
    });

    if (!isValid) {
        // Display error messages in a general location
        document.querySelector('.mail-response').innerHTML = errorMessage;
        document.querySelector('.mail-response').style.display = 'block';

        // Scroll to the first invalid field (if needed)
        const firstInvalidField = form.querySelector('.error-highlight');
        if (firstInvalidField) {
            firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalidField.focus(); // Optionally focus on the field
        }
        return; // Stop the function here
    }

    // Send the form data via AJAX if validation passes
    jQuery.ajax({
        url: '/wp-json/api/v1/sendMail', // Ensure this matches your REST API endpoint
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.status === true) {
                if (formSelector === '.register-page-form') {
                    setWatchVideoCookie();
                    // Redirect to the watch overview video page
                    window.location.href = '/overview-ix-databridge';
                }
                else if (formSelector === '.wp-register-page-form') {
                    setWatchVideoCookie();
                    // Redirect to the watch overview video page
                    window.location.href = '/'+ whitepaperId;

                    // // First, ensure that the PDF is opened in a new tab directly by user action
                    // const pdfWindow = window.open( '/'+ whitepaperId, '_blank');
                    //
                    // // Check if the pop-up was blocked
                    // if (pdfWindow === null) {
                    //     alert("It seems like the pop-up was blocked. Please allow pop-ups to view the PDF.");
                    // } else {
                    //     // Redirect to the new page after a short delay
                    //     setTimeout(function() {
                    //         window.location.href = '/ix-databridge'; // return to landing page
                    //     }, 300);  // 300ms should be sufficient for the pop-up to open
                    // }
                }
                else {
                    // Redirect to the thank you page
                    window.location.href = '/thankyou';
                }

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

function submitRegister(token) {
    submitForm(".register-page-form")
}

function submitWPRegister(token) {
    submitForm(".wp-register-page-form")
}

function setWatchVideoCookie() {
    var expires = new Date();
    expires.setTime(expires.getTime() + (30 * 24 * 60 * 60 * 1000)); // 30 days

    // Check the hostname to set cookies based on the environment
    if (window.location.hostname === 'interopx2.flywheelstaging.com') {
        // Set cookie for staging
        document.cookie = 'wordpress_watchVideo=yes; expires=' + expires.toUTCString() + '; path=/; domain=.interopx2.flywheelstaging.com; secure; samesite=None';
    } else if (window.location.hostname === 'interopx.com') {
        // Set cookie for production
        document.cookie = 'wordpress_watchVideo=yes; expires=' + expires.toUTCString() + '; path=/; domain=.interopx.com; secure; samesite=None';
    } else if (window.location.hostname === 'interopx.local') {
        // Set cookie for local environment (http://interopx.local or https://interopx.local)
        document.cookie = 'wordpress_watchVideo=yes; expires=' + expires.toUTCString() + '; path=/; domain=.interopx.local; secure; samesite=None';

        // document.cookie = 'watchVideo=yes; expires=' + expires.toUTCString() + '; path=/; domain=.interopx.local; samesite=None';
    }
}