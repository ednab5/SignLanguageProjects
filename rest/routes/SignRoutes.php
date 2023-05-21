<?php

Flight::route('POST /login', function(){
$login = Flight::request()->data->getData();
$username = $login['username'];
$password = $login['password'];
//$user = Flight::signService()->login($username, $password);

Flight::json(Flight::signService()->login($username, $password));
  

});

Flight::route('GET /register', function(){

    Flight::json(Flight::signService()->register());
});


?>
