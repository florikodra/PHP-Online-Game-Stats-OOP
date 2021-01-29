<?php

require_once("./classes/Logs.class.php");

function getUserIp(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


if(isset($_POST['buttonId'])){
    if(is_numeric($_POST['buttonId'])){
        $data = array(
            'buttonId' => $_POST['buttonId'],
            'userIp' => getUserIp(),
            'datetime' => date("Y-m-d h:i:sa")
        );

        $logs = new Logs;
        $logs->createLogFile($data);
        
        echo number_format($_POST['buttonId']);

        exit();
    }
}





