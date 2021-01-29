<?php

require_once("./classes/Session.class.php");
$session = new Session;
$session->checkSessionPages();

require_once("./classes/Logs.class.php");



if(isset($_GET['orderCount']) && $_GET['orderCount']==1){
    $order = "DESC";
    $orderType = 0;
    $orderIcon = "-up";
}else{
    $order = "ASC";
    $orderType = 1;
    $orderIcon = "-down";
}

if(!isset($_GET['orderCount'])){
    $orderIcon = "";
}

$logs = new Logs;
$allLogs = $logs->getAll($order);


if(isset($_GET['logout'])){
    $session->destroySession();
}

function baseUrl(){
    require_once("./classes/Config.class.php");
    $config = new Config;
    return $config->baseUrl();
}

