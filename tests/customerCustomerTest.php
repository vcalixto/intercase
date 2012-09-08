<?php
 
require_once 'PHPUnit/Autoload.php';
require_once '../app/Mage.php';
 
class customerCustomerTest extends PHPUnit_Framework_TestCase {
 
private $local_url_v1 = "http://magento.dev/index.php/api/soap/?wsdl";
private $local_url_v2 = "http://magento.dev/index.php/api/soap/?wsdl";
private $api_url_v1;
private $api_url_v2;
 
public function setUp() {
    Mage::app('default');
    $this->setApiUrlV2($this->local_url_v2);
}
 
public function getApiUrlV2() {
    return $this->api_url_v2;
}
 
public function setApiUrlV2($api_url_v2) {
    $this->api_url_v2 = $api_url_v2;
}
 
public function testLogin() {
 
   $cli = new SoapClient($this->api_url_v2);
 
   $username = 'vcalixto';
   $password = 'bt18262806';
 
   $result = $cli->login($username, $password);
   $session_id = isset($result) ? $result : null;
 
   $this->assertNotNull($session_id);
   return $session_id;
}

}