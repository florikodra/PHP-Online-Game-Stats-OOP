
<?php 
class Config{
    private $hostname = "localhost";
    private $db = "task";
    private $username = "root";
    private $password = "";

    //Set your URL
    public $baseUrl = "http://localhost/task/";

    public function __construct(){
    }

    public function db(){

        $conn = mysqli_connect ($this->hostname,$this->username,$this->password,$this->db);
        if(!$conn){
            die('Could not Connect My Sql:' .mysqli_error());
         }
        return $conn;
    }

    public function baseUrl(){
        return $this->baseUrl;
    }



}