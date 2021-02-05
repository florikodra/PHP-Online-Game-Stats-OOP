<?php

require_once('Config.class.php');
require_once('Session.class.php');

class Logs{

    private $table = "logs";
    private $config = "";
    private $session = "";

    function __construct(){
        $this->config = new Config;
        $this->session = new Session;
    }

    public function getAll($clickOrder){

        if(!$this->session->checkSession()){
            exit();
        }

        $sql = "SELECT *, COUNT(id) as clicks FROM  $this->table GROUP BY user_ip, buton_id, DATE_FORMAT(datetime, '%Y%m') ORDER BY clicks $clickOrder";
        $result = mysqli_query($this->config->db(), $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllNumber(){
        if(!$this->session->checkSession()){
            exit();
        }

        $sql = "SELECT * FROM  $this->table";
        $result = mysqli_query($this->config->db(), $sql);
         
        return mysqli_num_rows($result);
    }

    public function getActualToday(){
        if(!$this->session->checkSession()){
            exit();
        }

        $sql = "SELECT * FROM $this->table WHERE DATE(datetime) = CURDATE()";
        $result = mysqli_query($this->config->db(), $sql);
         
        return mysqli_num_rows($result);
    }

    public function createLogFile($data){
        $this->insertLog($data);
        $filename = "./Logs/".date('Y-m-d')."-click.log";
        $row = $data['userIp'].",".$data['datetime'].",".$data['buttonId']."\n";
        if (!file_exists($filename)){
            $logFile = fopen($filename, 'w') or die("Unable to open file!");
            fwrite($logFile, $row);
        }else{
            $logFile = fopen($filename, 'a') or die("Unable to open file!");
            fwrite($logFile, $row);
        }
    }

    private function insertLog($data){
        $userIp = $data['userIp'];
        $butonId = $data['buttonId'];
        $datetime = $data['datetime'];
        try {
        $sql = "Insert into  $this->table (user_ip, datetime, buton_id) values ('$userIp', '$datetime', '$butonId')";
        $result = mysqli_query($this->config->db(), $sql);
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
        //return mysqli_num_rows($result);
    }



}