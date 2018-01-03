<?php
// require 'MyApp_DbUnit_ArrayDataSet.php';
require './src/Market_Document.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class Update_Market_DocumentTest extends TestCase 
{
    use TestCaseTrait;

    private static $pdo=null;
   
  


       public function testUpdateMarketDocumentIsValidate()
    {
        $Market_Document = new Market_Document();
        // $this->markTestSkipped('Call to undefined method Market_Document::delete_Market_Document().' ); 
        $result=$Market_Document->update_Market_Document(3,'梦间集','重庆完美世界科技有限公司','呵呵呵');
        $this->assertEquals(false,$result);
        
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
        return $this->createMySQLXMLDataSet('Market_Document.xml');
    }

}
?>