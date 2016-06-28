<?php

class AframeTest extends PHPUnit_Framework_TestCase
{

    protected $aframe;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    public function test_php_version_to_low()
    {
        $this->assertGreaterThanOrEqual(70000, PHP_VERSION_ID, "No point to test it with PHP version less than PHP version 7.0!");
    }

    public function test_config()
    {
        $this->assertInstanceOf('\AframeVR\Core\Config', $this->aframe->config());
    }

    public function test_scene()
    {
        $this->assertInstanceOf('\AframeVR\Core\Scene', $this->aframe->scene());
    }
}
