// Define a singleton instance for validation messages
const ValidationMessage = (function () {
    let instance;

    function createInstance() {
        // Private variables and methods
        const validationRules = {
            firstName: {
                required: true,
                regex: /^[a-zA-Z ]+$/,
                message: 'First name is required and can only contain letters and spaces.',
            },
            lastName: {
                required: true,
                regex: /^[a-zA-Z ]+$/,
                message: 'Last name can only contain letters and spaces.',
            },
            email: {
                required: true,
                regex: /^\S+@\S+\.\S+$/,
                message: 'Email is required and must be a valid email address.',
            },
            password: {
                required: true,
                regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/,
                message: 'Password is required and must contain at least 8 characters, including one uppercase letter, one lowercase letter, and one digit.',
            },
        };

        return {
            // Public methods
            validateForm: function (form) {
                let isValid = true;

                for (const fieldName in validationRules) {
                    if (validationRules.hasOwnProperty(fieldName)) {
                        const field = form.elements[fieldName];
                        const rule = validationRules[fieldName];

                        // Reset error message
                        const errorElement = document.getElementById(`${fieldName}Error`);
                        errorElement.textContent = '';

                        // Check required field
                        if (rule.required && field.value.trim() === '') {
                            errorElement.textContent = 'Field is required.';
                            isValid = false;
                        }

                        // Check regex pattern
                        if (field.value.trim() !== '' && !rule.regex.test(field.value)) {
                            errorElement.textContent = rule.message;
                            isValid = false;
                        }
                    }
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

// Initialize the validation message singleton
const validationMessage = ValidationMessage.getInstance();

// Handle form submission
const settingsForm = document.getElementById('settingsForm');
settingsForm.addEventListener('submit', function (event) {
    event.preventDefault();
});
