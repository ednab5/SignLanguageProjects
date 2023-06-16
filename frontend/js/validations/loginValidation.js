// loginValidation.js

// Define a singleton instance for validation
const LoginValidation = (function () {
    let instance;

    function createInstance() {
        // Private methods
        function validateEmail(email) {
            const emailRegex = /^\S+@\S+\.\S+$/;
            return emailRegex.test(email);
        }

        return {
            // Public methods
            validateForm: function (form) {
                const emailInput = form.elements.email;
                const passwordInput = form.elements.password;

                let isValid = true;

                // Reset error messages
                document.getElementById('emailError').textContent = '';
                document.getElementById('passwordError').textContent = '';

                // Validate email
                if (!validateEmail(emailInput.value)) {
                    document.getElementById('emailError').textContent =
                        'Please enter a valid email address.';
                    isValid = false;
                }

                // Validate password
                if (!passwordInput.value) {
                    document.getElementById('passwordError').textContent = 'Password is required.';
                    isValid = false;
                }

                return isValid;
            },
        };
    }

    return {
        getInstance: function () {
            if (!instance) {
                instance = createInstance();
            }
            return instance;
        },
    };
})();

// Initialize the login validation
const loginValidation = LoginValidation.getInstance();

// Handle form submission
const loginForm = document.getElementById('loginForm');
loginForm.addEventListener('submit', function (event) {
    event.preventDefault();
    if (loginValidation.validateForm(this)) {
        // Form is valid, perform further actions (e.g., submit the form)
        // Replace this line with the desired action you want to perform
        console.log('Form submitted successfully!');
    }
});
