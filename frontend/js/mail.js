$(document).ready(function () {
    // Handle form submission
    $("#contactForm").submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get form data
        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();

        // Create an object to hold the form data
        var formData = {
            name: name,
            email: email,
            subject: subject,
            message: message
        };

        // Send the form data to the server using Ajax
        $.ajax({
            type: "POST",
            url: "http://localhost/signlanguage/backend/send_message",
            data: formData,
            success: function (response) {
                $("#contactForm")[0].reset();

                // Send email to the specified recipient
                var recipientEmail = "ademirson55@hotmail.com";
                var emailUrl = "mailto:" + recipientEmail + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(message);
                window.location.href = emailUrl;
            },
            error: function (xhr, status, error) {
                // Handle the error response
                $("#success").html("Failed to send message. Please try again.");
            }
        });
    });
});
