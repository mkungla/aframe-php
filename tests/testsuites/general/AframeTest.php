<?php
use \AframeVR\Tests\CommonTests;

class AframeTest extends PHPUnit_Framework_TestCase
{
    use CommonTests;

    const A_INSTANCE = 'AframeVR\Aframe';

    public function test_php_version_to_low()
    {
        $this->assertGreaterThanOrEqual(70000, PHP_VERSION_ID, "No point to test it with PHP version less than PHP version 7.0!");
    }

    public function a_get_instance()
    {
        return new \AframeVR\Aframe();
    }
}
