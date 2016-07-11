<?php

class FlatShaderTest extends PHPUnit_Framework_TestCase
{

    protected $entity;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->entity = $aframe->scene()->entity();
    }

    public function test_properties()
    {
        $this->entity->material()
            ->shader('flat')
            ->color('#000');
        $this->entity->material()
            ->shader('flat')
            ->fog(false);
        $this->entity->material()
            ->shader('flat')
            ->height(1080);
        $this->entity->material()
            ->shader('flat')
            ->src('video-url');
        $this->entity->material()
            ->shader('flat')
            ->width(1920);
        
        $shader = $this->entity->material()->shader('flat');
        

        $this->assertAttributeEquals('#000','color',$shader);
        $this->assertAttributeEquals('false','fog',$shader);
        $this->assertAttributeEquals(1080,'height',$shader);
        $this->assertAttributeEquals('video-url','src',$shader);
        $this->assertAttributeEquals(1920,'width',$shader);
        
        $shader->defaults();
    }

    public function test_removeDefaultDOMAttributes()
    {
        $this->assertNotNull($this->entity->material()
            ->shader('flat')
            ->removeDefaultDOMAttributes());
    }
}
