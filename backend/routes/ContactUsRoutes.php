<?php

require_once './services/ContactUsServices.php';

Flight::route('POST /send_message', function(){
    $name = Flight::request()->data['name'];
    $email = Flight::request()->data['email'];
    $subject = Flight::request()->data['subject'];
    $message = Flight::request()->data['message'];

    $contactServices = new ContactUsServices();
    $result = $contactServices->sendMessage($name, $email, $subject, $message);

    if ($result === true) {
        Flight::json(array('message' => 'Message sent successfully'), 200);
    } else {
        Flight::json(array('message' => 'Failed to send message'), 500);
    }
});

?>