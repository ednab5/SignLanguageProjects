<?php

require_once './Database.class.php';

class ContactUsDao {
    private $conn;

    public function __construct() {
        $this->conn = Config::getInstance();
    }

    public function sendMessage($name, $email, $subject, $message) {
        // Prepare an SQL insert statement
        $insertStmt = $this->conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)");

        // Bind the values to the statement
        $insertStmt->bindParam(':name', $name);
        $insertStmt->bindParam(':email', $email);
        $insertStmt->bindParam(':subject', $subject);
        $insertStmt->bindParam(':message', $message);

        // Execute the statement
        $insertStmt->execute();

        // If message is sent successfully, return true
        if ($insertStmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>
