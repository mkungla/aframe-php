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
        $aframe->config()->set('cdn_url', 'https://url-to-aframe.js');

        $this->assertNotContains($aframe->config()
            ->get('cdn_url'), $aframe->scene()
            ->save());

        $aframe = new \AframeVR\Aframe();
        $aframe->config()->set('cdn_url', 'https://url-to-aframe.js');
        $aframe->config()->set('use_cdn', true);

        $this->assertContains($aframe->config()
            ->get('cdn_url'), $aframe->scene()
            ->save());
    }
}
