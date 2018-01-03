<?php
require_once("conn.php");

class Market_Activity{
    private $db;
    private $result; //mysqli_result
    private $array;  //mysqli_array
    private $signal; //bool

    function __construct(){
    	$this->db=new Conn('localhost:3306','root','gzh1105','crm');
      $this->db->connect();

    }


  function get_Market_Activity(){
       $tableName="market_activity";
       $condition="";
       $this->result=$this->db->select($tableName,$condition);
       return $this->result;
    }
  
  //$sql="delete from market_activity where id={$id}";
  function delete_Market_Activity($info,$content){
      $tableName="market_activity";
      $condition="where ".$info." = ".$content;
      // $_SESSION['condition']=$condition;
      //true or false
      $this->result=$this->db->delete($tableName,$condition);
      return $this->result;
  }

//$sql="update market_Activity set name='{$name}',message='{$message}',address='{$address}' where id='{$id}'";
  function update_Market_Activity($id,$name,$message,$address){
      $tableName="market_activity";
      $change="name='".$name."',message='".$message."',address=".$address;
      $condition="where id =".$id;
      $this->signal=$this->db->update($tableName,$change,$condition);
      return $this->signal;
    }

}
?>