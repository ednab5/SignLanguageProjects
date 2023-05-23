<?php
require_once __DIR__ . '/../env.class.php';

class SignDao {

    private $conn;


    public function __construct(){
        try {

  
          $servername = Config::DB_HOST();
          $username = Config::DB_USERNAME();
          $password = Config::DB_PASSWORD();
          $schema = Config::DB_SCHEME();
          $port = Config::DB_PORT();
          $this->conn = new PDO("mysql:host=$servername;dbname=$schema;port=$port", $username, $password);
       
       
        $options = array(
        	PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
        	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );
    
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }


    public function login($username,$password){

      $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = '$username' AND password ='$password' ");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public function register($name,$username,$password){

      $stmt = $this->conn->prepare("INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password') ;");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    
  }


    

  }

?>
