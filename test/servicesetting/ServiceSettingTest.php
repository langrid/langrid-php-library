<?php

require_once dirname(__FILE__) . '/../test_settings.php';

class ServiceSettingTest extends PHPUnit_Framework_TestCase
{
	private $setting;

    function testSimpleSetting() {
        $data = <<<json
{
  "connection":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "langrid_user",
    "passwd": "password"
  },
  "serviceSetting":{}
}
json
            ;
        $this->setting = new ServiceSetting(json_decode($data));

        $this->assertTrue(FALSE === $this->setting->isProxyEnabled());
        $this->assertTrue(FALSE === $this->setting->isProxyAuthNeeded());
        $this->assertTrue(FALSE === $this->setting->getProxyUri());
        $this->assertTrue(FALSE === $this->setting->getProxyUserId());
        $this->assertTrue(FALSE === $this->setting->getProxyPasswd());

        $this->assertTrue($this->setting->getUserId() === 'langrid_user');
        $this->assertTrue($this->setting->getPasswd() === 'password');

        $this->assertTrue(
            $this->setting->buildServiceUri('kyoto1.langrid:TestSVC') === 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TestSVC');
    }

    function testProxySettingWithAuth() {
        $data = <<<json
{
  "connection":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "langrid_user",
    "passwd": "password",
	"proxy":{
	  "enabled": 1,
      "uri": "http://myproxy.example.com",
      "userId": "proxyuser",
      "passwd": "proxypass"
	}
  },
  "serviceSetting":{}
}
json
            ;
        $this->setting = new ServiceSetting(json_decode($data));

        $this->assertTrue($this->setting->isProxyEnabled());
        $this->assertTrue($this->setting->isProxyAuthNeeded());
        $this->assertTrue($this->setting->getProxyUri() === 'http://myproxy.example.com');
        $this->assertTrue($this->setting->getProxyUserId() === 'proxyuser');
        $this->assertTrue($this->setting->getProxyPasswd() === 'proxypass');

        $this->assertTrue($this->setting->getUserId() === 'langrid_user');
        $this->assertTrue($this->setting->getPasswd() === 'password');

        $this->assertTrue(
            $this->setting->buildServiceUri('kyoto1.langrid:TestSVC') === 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TestSVC');
    }

    function testProxySettingWithoutAuth() {
        $data = <<<json
{
  "connection":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "langrid_user",
    "passwd": "password",
	"proxy":{
	  "enabled": 1,
      "uri": "http://myproxy.example.com"
	}
  },
  "serviceSetting":{}
}
json
            ;
        $this->setting = new ServiceSetting(json_decode($data));

        $this->assertTrue($this->setting->isProxyEnabled());
        $this->assertTrue(FALSE === $this->setting->isProxyAuthNeeded());
        $this->assertTrue($this->setting->getProxyUri() === 'http://myproxy.example.com');
        $this->assertTrue(FALSE === $this->setting->getProxyUserId());
        $this->assertTrue(FALSE === $this->setting->getProxyPasswd());

        $this->assertTrue($this->setting->getUserId() === 'langrid_user');
        $this->assertTrue($this->setting->getPasswd() === 'password');

        $this->assertTrue(
            $this->setting->buildServiceUri('kyoto1.langrid:TestSVC') === 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TestSVC');

    }

    function testProxySettingDisabled() {
        $data = <<<json
{
  "connection":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "langrid_user",
    "passwd": "password",
	"proxy":{
	  "enabled": 0,
      "uri": "http://myproxy.example.com",
      "userId": "proxyuser",
      "passwd": "proxypass"
	}
  },
  "serviceSetting":{}
}
json
            ;
        $this->setting = new ServiceSetting(json_decode($data));

        $this->assertTrue(FALSE === $this->setting->isProxyEnabled());
        $this->assertTrue(FALSE === $this->setting->isProxyAuthNeeded());
        $this->assertTrue(FALSE === $this->setting->getProxyUri());
        $this->assertTrue(FALSE === $this->setting->getProxyUserId());
        $this->assertTrue(FALSE === $this->setting->getProxyPasswd());

        $this->assertTrue($this->setting->getUserId() === 'langrid_user');
        $this->assertTrue($this->setting->getPasswd() === 'password');

        $this->assertTrue(
            $this->setting->buildServiceUri('kyoto1.langrid:TestSVC') === 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TestSVC');
    }

    function testInvalidJson() {
        // connectionz is invalid name
        $data = <<<json
{
  "connectionz":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "langrid_user",
    "passwd": "password",
	"proxy":{
	  "enabled": 1,
      "uri": "http://myproxy.example.com",
      "userId": "proxyuser",
      "passwd": "proxypass"
	}
  },
  "serviceSetting":{}
}
json
            ;
        try {
            $this->setting = new ServiceSetting(json_decode($data));
            $this->assertTrue(FALSE, 'This test is expected that throw Exception.');
        } catch (Exception $e) {
            // Success
        }
    }

    function testBrokenJson() {
        // connectionz is invalid name
        $data = <<<json
{
  "connectionz":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "langrid_user",
    "passwd": "password
json
            ;
        try {
            $this->setting = new ServiceSetting(json_decode($data));
            $this->assertTrue(FALSE, 'This test is expected that throw Exception.');
        } catch (Exception $e) {
            // Success
        }
    }
}
