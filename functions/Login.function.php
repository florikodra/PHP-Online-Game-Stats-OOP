<?php

require_once("./classes/User.class.php");
require_once("./classes/Session.class.php");
$session = new Session;

$session->checkSessionLogin();

$php_error = false;


if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username && $password){

        $user = new User;

        $login = $user->login($username, $password);

        if(!$login){
            $php_error = true;
        }else{
            header('location:profile');
        }
    }else{
        $php_error = true;
    }
}
