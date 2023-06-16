$(document).ready(function () {
    // Builder for the AJAX request
    var ajaxRequestBuilder = {
        requestType: 'POST',
        url: '',
        data: {},
        successCallback: function () { },
        errorCallback: function () { },

        setRequestType: function (type) {
            this.requestType = type;
            return this;
        },

        setUrl: function (url) {
            this.url = url;
            return this;
        },

        setData: function (data) {
            this.data = data;
            return this;
        },

        setSuccessCallback: function (callback) {
            this.successCallback = callback;
            return this;
        },

        setErrorCallback: function (callback) {
            this.errorCallback = callback;
            return this;
        },

        build: function () {
            return this;
        }
    };

    $('#loginForm').submit(function (e) {
        e.preventDefault();

        // Validate the form
        if (!loginValidation.validateForm(this)) {
            return; // Exit if validation fails
        }

        // Get form data
        var formData = $(this).serialize();

        // Build the AJAX request
        var ajaxRequest = ajaxRequestBuilder
            .setRequestType('POST')
            .setUrl('http://localhost/signlanguage/backend/login')
            .setData(formData)
            .setSuccessCallback(function (response) {
                // Store user ID in localStorage
                localStorage.setItem('userId', response.user.id);

                // Redirect to a new screen or URL
                window.location.href = 'homepage.html';
            })
            .setErrorCallback(function (xhr, status, error) {
                // Handle error
                console.log(error);
            })
            .build();

        // Send the AJAX request
        $.ajax({
            type: ajaxRequest.requestType,
            url: ajaxRequest.url,
            data: ajaxRequest.data,
            success: ajaxRequest.successCallback,
            error: ajaxRequest.errorCallback
        });
    });
});
