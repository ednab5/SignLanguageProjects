<?php

Flight::route('POST /login', function(){
   $login = Flight::request()->data->getData();
   $username = $login['username'];
   $password = $login['password'];

   Flight::json(Flight::signService()->login($username,$password));
});

Flight::route('POST /register', function(){

    $register = Flight::request()->data->getData();
    $name = $register['name'];
    $username = $register['username'];
    $password = $register['password'];
    $password2 = $register['password2'];

    Flight::json(Flight::signService()->register($name,$username,$password));
});


?>
