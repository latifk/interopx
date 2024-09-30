function submitForm(formSelector) {
    var form = document.querySelector(formSelector);
    var formData = new FormData(form);
    var isValid = true; // Flag to track form validity
    var errorMessage = ''; // To accumulate error messages

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