<?php
// require 'MyApp_DbUnit_ArrayDataSet.php';
require './src/Register.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class RegisterTest extends TestCase
{
    use TestCaseTrait;

    private static $pdo=null;
   

    public function testRegisterIsValidate()
    {
        $Register = new Register();

        $result=$Register->register('look4you','look4you','1172443266@qq.com','1514439467');
        
        $this->assertEquals(true,$result);
        

    }

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->conn;
    }

    
    public function getDataSet()
    {
        return $this->createXMLDataSet('Register_DataSet.xml');
    }


    


}
?>