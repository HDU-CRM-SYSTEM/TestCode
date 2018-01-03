<?php
require_once("conn.php");

class Market_Management{
    private $db;
    private $result; //mysqli_result
    private $array;  //mysqli_array
    private $signal; //bool

    function __construct(){
    	$this->db=new Conn('localhost:3306','root','gzh1105','crm');
      $this->db->connect();

    }


  function get_Market_Management(){
       $tableName="market_management";
       $condition="";
       $this->result=$this->db->select($tableName,$condition);
       return $this->result;
    }
  
  function delete_Market_Management($info,$content){
      $tableName="market_management";
      $condition="where ".$info." = ".$content;
      // $_SESSION['condition']=$condition;
      //true or false
      $this->result=$this->db->delete($tableName,$condition);
      return $this->result;
  }

//$sql="update market_management set name='{$name}',message='{$message}',address='{$address}' where id='{$id}'";
  function update_Market_Management($id,$name,$message,$address){
      $tableName="market_management";
      $change="name='".$name."',message='".$message."',address=".$address;
      $condition="where id =".$id;
      $this->signal=$this->db->update($tableName,$change,$condition);
      return $this->signal;
    }

}
?>