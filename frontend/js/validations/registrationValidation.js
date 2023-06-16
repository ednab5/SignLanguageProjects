// Define a singleton instance for validation
const RegistrationValidation = (function () {
    let instance;

    function createInstance() {
        // Private variables and methods
        const regexPatterns = {
            name: /^[a-zA-Z ]+$/,
            email: /^\S+@\S+\.\S+$/,
            password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm,
        };

        function validateName(name) {
            return regexPatterns.name.test(name);
        }

        function validateEmail(email) {
            return regexPatterns.email.test(email);
        }

        function validatePassword(password) {
            return regexPatterns.password.test(password);
        }

        return {
            // Public methods
            validateForm: function (form) {
                const firstNameInput = form.elements.firstName;
                const lastNameInput = form.elements.lastName;
                const emailInput = form.elements.email;
                const passwordInput = form.elements.password;

                let isValid = true;

                // Reset error messages
                document.getElementById('firstNameError').textContent = '';
                document.getElementById('lastNameError').textContent = '';
                document.getElementById('emailError').textContent = '';
                document.getElementById('passwordError').textContent = '';

                // Validate first name
                if (!validateName(firstNameInput.value)) {
                    document.getElementById('firstNameError').textContent =
                        'Please enter a valid first name.';
                    isValid = false;
                }

                // Validate last name
                if (!validateName(lastNameInput.value)) {
                    document.getElementById('lastNameError').textContent =
                        'Please enter a valid last name.';
                    isValid = false;
                }

                // Validate email
                if (!validateEmail(emailInput.value)) {
                    document.getElementById('emailError').textContent =
                        'Please enter a valid email address.';
                    isValid = false;
                }

                // Validate password
                if (!validatePassword(passwordInput.value)) {
                    document.getElementById('passwordError').textContent =
                        'Please enter a valid password. It must contain at least 8 characters, including one uppercase letter, one lowercase letter, and one digit.';
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

// Initialize the registration validation
const registrationValidation = RegistrationValidation.getInstance();

// Handle form submission
const registrationForm = document.getElementById('registrationForm');
registrationForm.addEventListener('submit', function (event) {
    event.preventDefault();
    if (registrationValidation.validateForm(this)) {
        this.submit();
    }
});
