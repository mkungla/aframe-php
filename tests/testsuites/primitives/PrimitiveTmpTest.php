<?php
class PrimitiveTmpTest extends PHPUnit_Framework_TestCase
{


    protected $aframe;
    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    public function test_instance()
    {
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->aframe->scene()->sphere());
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->aframe->scene()->plane());
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->aframe->scene()->video());
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->aframe->scene()->torus());
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->aframe->scene()->ring());
    }

}
