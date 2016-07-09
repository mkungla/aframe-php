<?php

class EntityTest extends PHPUnit_Framework_TestCase
{

    protected $aframe;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        
    }

    public function test_EntityChildrenFactory()
    {
        $this->assertInstanceOf('\AframeVR\Core\Entity', $this->aframe->scene()
            ->entity()->mixin('mix'));
        
       
    }
    

}
