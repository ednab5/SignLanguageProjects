<?php

require_once './Database.class.php';

class RegistrationDao {
    private $conn;

    public function __construct() {
        $this->conn = Config::getInstance();
    }

    public function registerUser($firstName, $lastName, $email, $password) {
        // Prepare an SQL select statement to check if the user already exists
        $checkStmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();

        // If user already exists, return with a validation message
        if ($checkStmt->rowCount() > 0) {
            return "User already exists";
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare an SQL insert statement
        $insertStmt = $this->conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:firstName, :lastName, :email, :password)");

        // Bind the values to the statement
        $insertStmt->bindParam(':firstName', $firstName);
        $insertStmt->bindParam(':lastName', $lastName);
        $insertStmt->bindParam(':email', $email);
        $insertStmt->bindParam(':password', $hashedPassword);

        // Execute the statement
        $insertStmt->execute();

        // If registration is successful, return with a success message
        if ($insertStmt->rowCount() > 0) {
            return "Registration successful";
        } else {
            return "Registration failed";
        }
    }

    public function loginUser($email, $password) {
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }
    
        // Prepare an SQL select statement to retrieve the user by email
        $selectStmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $selectStmt->bindParam(':email', $email);
        $selectStmt->execute();
    
        // If user exists, verify the password
        if ($selectStmt->rowCount() > 0) {
            $user = $selectStmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $user['password'];
    
            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['start_time'] = time();
                unset($user['password']);
                return array('message' => 'Login successful', 'user' => $user);
            } else {
                return "Invalid password";
            }
        } else {
            return "User not found";
        }
    }
  
    public function updateUser($userId, $firstName, $lastName, $email, $password) {
        // Prepare an SQL update statement
        $updateStmt = $this->conn->prepare("UPDATE users SET first_name = :firstName, last_name = :lastName, email = :email, password = :password WHERE id = :userId");

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Bind the values to the statement
        $updateStmt->bindParam(':firstName', $firstName);
        $updateStmt->bindParam(':lastName', $lastName);
        $updateStmt->bindParam(':email', $email);
        $updateStmt->bindParam(':password', $hashedPassword);
        $updateStmt->bindParam(':userId', $userId);

        // Execute the statement
        $updateStmt->execute();

        // If update is successful, return with a success message
        if ($updateStmt->rowCount() > 0) {
            return "User information updated successfully";
        } else {
            return "Failed to update user information";
        }
    }
    public function getUser($userId) {
        // Prepare an SQL select statement to retrieve the user by ID
        $selectStmt = $this->conn->prepare("SELECT * FROM users WHERE id = :userId");
        $selectStmt->bindParam(':userId', $userId);
        $selectStmt->execute();

        // Fetch the user information
        $user = $selectStmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
}

?>
