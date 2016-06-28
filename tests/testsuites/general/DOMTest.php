<?php

class DOMTest extends PHPUnit_Framework_TestCase
{

    protected $aframe;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    public function test_CDN()
    {
        $aframe = new \AframeVR\Aframe();
        $this->assertNotContains($aframe->config()
            ->get('CDN'), $aframe->scene()
            ->save());
        
        $aframe = new \AframeVR\Aframe();
        $aframe->config()->set('useCDN', true);
        
        $this->assertContains($aframe->config()
            ->get('CDN'), $aframe->scene()
            ->save());
    }
}
