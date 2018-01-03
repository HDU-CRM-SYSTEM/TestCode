<?php
// require 'MyApp_DbUnit_ArrayDataSet.php';
require './src/Login.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class LoginTest extends TestCase 
{
    use TestCaseTrait;

    private static $pdo=null;
   

    public function testLoginIsValidate()
    {
        $Login = new Login();
        $Login->Login('look4you','look4you');
        $queryTable = $this->getConnection()->createQueryTable(
                    'user', 'SELECT * FROM user where username ="look4you" and password ="look4you"');
        $expectedTable = $this->createFlatXmlDataSet("Register_DataSet.xml")
                      ->getTable("user");
        $this->markTestSkipped('assertTablesEqual has not been implement.' );             
        $this->assertTablesEqual($expectedTable, $queryTable);
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