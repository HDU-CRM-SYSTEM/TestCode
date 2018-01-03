<?php
// require 'MyApp_DbUnit_ArrayDataSet.php';
require './src/Market_Management.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class Market_ManagementTest extends TestCase 
{
    use TestCaseTrait;

    private static $pdo=null;
   
    

    public function testGetMarketManagementIsValidate()
    {
        // $Market_Management = new Market_Management();
        // $result=$Market_Management->get_Market_Management();
        $dataSet = $this->getConnection()->createDataSet(['market_management']);
        $expectedDataSet = $this->getDataSet();
        //$expectedDataSet = $this->createFlatXmlDataSet('Market_Management.xml');
        $this->assertDataSetsEqual($expectedDataSet, $dataSet);
        
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