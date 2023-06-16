$(document).ready(function () {
    // Builder for AJAX request
    var AjaxRequestBuilder = function () {
        this.url = '';
        this.type = 'POST';
        this.successCallback = function () { };
        this.errorCallback = function () { };
    };

    AjaxRequestBuilder.prototype.setUrl = function (url) {
        this.url = url;
        return this;
    };

    AjaxRequestBuilder.prototype.setType = function (type) {
        this.type = type;
        return this;
    };

    AjaxRequestBuilder.prototype.setSuccessCallback = function (callback) {
        this.successCallback = callback;
        return this;
    };

    AjaxRequestBuilder.prototype.setErrorCallback = function (callback) {
        this.errorCallback = callback;
        return this;
    };

    AjaxRequestBuilder.prototype.build = function () {
        var request = {
            url: this.url,
            type: this.type,
            success: this.successCallback,
            error: this.errorCallback
        };
        return request;
    };

    // Create logout request using the builder
    var logoutRequest = new AjaxRequestBuilder()
        .setUrl('http://localhost/signlanguage/backend/logout')
        .setSuccessCallback(function () {
            localStorage.removeItem('userId');
            window.location.href = 'index.html';
        })
        .setErrorCallback(function (xhr, status, error) {
            console.error(error);
        })
        .build();

    // Handle logout button click
    $('#logoutButton').on('click', function () {
        // Send the logout request
        $.ajax(logoutRequest);
    });
});
