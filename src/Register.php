<?php
require_once("conn.php");

class Register{
    private $db;
    private $result; //mysqli_result
    private $array;  //mysqli_array
    private $signal; //bool

    function __construct(){
    	$this->db=new Conn('localhost:3306','root','gzh1105','crm');
      $this->db->connect();

    }

//$sql="insert into user(username,email,password,addtime) values('{$username}','{$email}','{$password}','{$addtime}')";
  function register($name,$email,$pwd,$addtime){
 	    $tableName="user";
      $fields="(username,email,password,addtime)";
      $value="('".$name."','".$email."','".$pwd."','".$addtime."')";
      $this->result=$this->db->insert($tableName,$fields,$value);
      return $this->result;
 	}

}
?>