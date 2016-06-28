<?php
namespace AframeVR\Tests;

trait CommonHelper
{

    /**
     * Test is instance
     */
    public function test_instance()
    {
        $aframe = new \AframeVR\Aframe();
        $this->assertInstanceOf(self::A_INSTANCE, $this->a_get_instance());
    }
}
