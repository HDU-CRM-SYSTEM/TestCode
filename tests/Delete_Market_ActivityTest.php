<?php
// require 'MyApp_DbUnit_ArrayDataSet.php';
require './src/Market_Activity.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class Delete_Market_ActivityTest extends TestCase 
{
    use TestCaseTrait;

    private static $pdo=null;
   
    

      public function testDeleteMarketManagementIsValidate()
    {
        $Market_Activity=new Market_Activity();
        // $MarketManagement = new Market_Management();
        // $this->markTestSkipped('Call to undefined method Market_Management::delete_Market_Management().' ); 
        $result=$Market_Activity->delete_Market_Activity('id',1);
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
        return $this->createMySQLXMLDataSet('Market_Management.xml');
    }

}
?>