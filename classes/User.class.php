<?php

require_once('Config.class.php');
require_once('Session.class.php');

class User {


public function login($username, $password){

    
    $config = new Config;

    $username = mysqli_real_escape_string($config->db(),$username);
    $password = mysqli_real_escape_string($config->db(),$password);

    $password = md5($password);
    
    $sql = "Select id from users where username='$username' and password='$password'";
    $row = mysqli_query($config->db(), $sql);
    $row = mysqli_fetch_array($row)['id'];
    

    if($row){
        $session = new Session;
        $session->setSession($row);
       return true;
    }else{
        return false;
    }

}







}


?>