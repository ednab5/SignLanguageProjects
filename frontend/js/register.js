$(document).ready(function () {
    // Singleton pattern
    var registerForm = {
        init: function () {
            this.cacheDOM();
            this.bindEvents();
        },
        cacheDOM: function () {
            this.form = $('form');
            this.firstNameInput = $('input[name="firstName"]');
            this.lastNameInput = $('input[name="lastName"]');
            this.emailInput = $('input[name="email"]');
            this.passwordInput = $('input[name="password"]');
        },
        bindEvents: function () {
            this.form.on('submit', this.handleSubmit.bind(this));
        },
        handleSubmit: function (event) {
            event.preventDefault();

            // Check if the form is valid
            if (!this.form[0].checkValidity()) {
                // Form is not valid, display error messages
                this.form[0].reportValidity();
                return;
            }

            // Get the form data
            var firstName = this.firstNameInput.val();
            var lastName = this.lastNameInput.val();
            var email = this.emailInput.val();
            var password = this.passwordInput.val();

            // Create an object to send as the request body
            var data = {
                firstName: firstName,
                lastName: lastName,
                email: email,
                password: password
            };

            // Observer pattern
            var successHandler = function (response) {
                window.location.href = 'login.html';
            };

            var errorHandler = function (xhr) {
                // Registration failed, show error message
                alert('Registration failed: ' + xhr.responseText);
            };

            // Perform AJAX request
            $.ajax({
                type: 'POST',
                url: 'http://localhost/signlanguage/backend/register',
                data: data,
                success: successHandler,
                error: errorHandler
            });
        }
    };

    // Initialize the register form
    registerForm.init();
});
