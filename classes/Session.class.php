<?php

class Session {



public function setSession($id){
    if(is_numeric($id)){
        session_start();
        $_SESSION["userId"] = $id;
    }
}


public function destroySession(){
    session_destroy();
    $this->checkSessionPages();
}

public function checkSessionLogin(){
    session_start();
    if(isset($_SESSION["userId"])){
        header('location:profile');
    }
}

public function checkSession(){
    if(isset($_SESSION["userId"])){
        return true;
    }else{
        return false;
    }
}

public function checkSessionPages(){
    session_start();
    if(!isset($_SESSION["userId"])){
        header('location:login');
    }
}


    
}