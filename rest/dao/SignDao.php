<?php
require_once __DIR__ . '/../env.class.php';

class SignDao {

    private $conn;

    /**
    * constructor of dao class
    */
    public function __construct(){
        try {

        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */
          $servername = Config::DB_HOST();
          $username = Config::DB_USERNAME();
          $password = Config::DB_PASSWORD();
          $schema = Config::DB_SCHEME();
          $port = Config::DB_PORT();
          $this->conn = new PDO("mysql:host=$servername;dbname=$schema;port=$port", $username, $password);
       
        /*options array neccessary to enable ssl mode - do not change*/
        $options = array(
        	PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
        	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );
        /** TODO
        * Create new connection
        * Use $options array as last parameter to new PDO call after the password
        */

        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    /** TODO
    * Implement DAO method used to get account table
    */
    public function login($username, $password){
    
      $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ".$username." AND password = ".$password."
      ;");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC); 
       
    
    }

    /** TODO
    * Implement DAO method used to get account with sum of transaction amount
    */

    public function register(){
      $stmt = $this->conn->prepare("SELECT a.id,a.first_name, SUM(t.amount) as 'total_amount',
      FROM accounts a 
      JOIN transactions t ON a.id = t.account_id 
      GROUP BY a.id
      ;");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    
  }


    

  }

?>
