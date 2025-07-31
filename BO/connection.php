<?php
class connection{
  public static function getConnection(){
    try{
      $server = "localhost";
      $db = "zoo_database";
      $username = "root";
      $password = "";

      // Create connection
      $conn = new PDO("mysql:host=$server;dbname=$db;",$username,$password);
      return $conn;
    }catch(Exception $ex){
      throw $ex;
    }
  }
}
?>