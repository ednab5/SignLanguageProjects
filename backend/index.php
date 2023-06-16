<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

// Check the request method
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit;
}

require_once 'vendor/autoload.php';

require_once __DIR__.'/routes/RegistrationRoutes.php';
require_once __DIR__.'/routes/DictionaryRoutes.php';
require_once __DIR__.'/routes/ContactUsRoutes.php';

Flight::start();

?>