<?php  
class Conn{

         private $conn; 
         private $host;
         private $dbuser;
         private $dbpasswd;
         private $dbname;
             
        //构造函数
        function __construct($host, $dbuser, $dbpasswd, $dbname) {
             $this->host=$host;
             $this->dbuser=$dbuser;
             $this->dbpasswd=$dbpasswd;
             $this->dbname=$dbname;
        }

        function connect(){
          $this->conn=mysqli_connect($this->host,$this->dbuser,$this->dbpasswd,$this->dbname) 
                    or die("DB connection error!".mysqli_connect_error());   
          $this->conn->query("set names 'utf-8'");
          
        }

        function close(){
          mysqli_close($this->conn);
        }
        
        function query($sql){
           return mysqli_query($this->conn, $sql); 
        }     
    

        function myArray($result){
           return mysqli_fetch_assoc($result);
        }

        function rows($result){
          return mysqli_num_rows($result);
        }

        function select($tableName,$condition){
          return $this->query("SELECT * FROM $tableName $condition");
        }

        function insert($tableName,$fields,$value){
          return $this->query("INSERT INTO $tableName $fields VALUES $value");
        }

        function delete($tableName,$condition){
          return $this->query("DELETE FROM $tableName $condition");
        }

        function update($tableName,$change,$condition){
          return $this->query("UPDATE $tableName SET $change $condition");
        }
}






?>