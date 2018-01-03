<?php
require_once("conn.php");

class Login{
    private $db;
    private $result; //mysqli_result
    private $array;  //mysqli_array
    private $signal; //bool

    function __construct(){
    	$this->db=new Conn('localhost:3306','root','gzh1105','crm');
      $this->db->connect();

    }

//$sql="select id from user where (username='{$username}') and (password='{$password}')";
  function login($name,$pwd){
       $tableName="user";
       $condition="where username = '".$name."' and password = '".$pwd."'";
       $this->result=$this->db->select($tableName,$condition);
       if ($this->result) {
         $this->array=$this->db->myArray($this->result);  
         mysqli_free_result($this->result);
       }
       return $this->array;
  }

}
?>