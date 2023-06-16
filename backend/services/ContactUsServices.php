<?php

require_once './dao/ContactUsDao.php';

class ContactUsServices {
    private $contactDao;

    public function __construct() {
        $this->contactDao = new ContactUsDao();
    }

    public function sendMessage($name, $email, $subject, $message) {
        // Send the message
        $result = $this->contactDao->sendMessage($name, $email, $subject, $message);
        return $result;
    }
}

?>