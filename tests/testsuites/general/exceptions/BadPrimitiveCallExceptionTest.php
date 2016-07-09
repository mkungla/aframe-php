<?php

class BadPrimitiveCallExceptionTest extends PHPUnit_Framework_TestCase
{

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    /**
     * Test Entity::component
     */
    public function test_Entity()
    {
        $this->setExpectedException('\AframeVR\Core\Exceptions\BadPrimitiveCallException');
        
        $this->aframe->scene()
            ->box()
            ->child()->InvalidPrimitveName();
    }


}
