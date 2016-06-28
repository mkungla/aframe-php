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
        $this->assertNotContains($this->aframe->config()->get('CDN'), $this->aframe->scene()
            ->save());
        
        $this->aframe->scene()->dom()->useCDN();
        
        $this->assertContains($this->aframe->config()->get('CDN'), $this->aframe->scene()
            ->save());
    }
}