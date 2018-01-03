<?php
require_once("conn.php");

class Market_Document{
    private $db;
    private $result; //mysqli_result
    private $array;  //mysqli_array
    private $signal; //bool

    function __construct(){
    	$this->db=new Conn('localhost:3306','root','gzh1105','crm');
      $this->db->connect();

    }


  function get_Market_Document(){
       $tableName="market_document";
       $condition="";
       $this->result=$this->db->select($tableName,$condition);
       return $this->result;
    }
  
  //$sql="delete from market_Document where id={$id}";
  function delete_Market_Document($info,$content){
      $tableName="market_document";
      $condition="where ".$info." = ".$content;
      // $_SESSION['condition']=$condition;
      //true or false
      $this->result=$this->db->delete($tableName,$condition);
      return $this->result;
  }

//$sql="update market_Document set name='{$name}',message='{$message}',address='{$address}' where id='{$id}'";
  function update_Market_Document($id,$name,$message,$address){
      $tableName="market_document";
      $change="name='".$name."',message='".$message."',address=".$address;
      $condition="where id =".$id;
      $this->signal=$this->db->update($tableName,$change,$condition);
      return $this->signal;
    }

}
?>