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
            ->repeat(2, 2);
        $this->entity->material()
            ->shader('flat')
            ->src('video-url');
        $this->entity->material()
            ->shader('flat')
            ->width(1920);
        
        $shader = $this->entity->material()->shader('flat');
        
        $this->assertEquals($shader->color, '#000');
        $this->assertEquals($shader->fog, 'false');
        $this->assertEquals($shader->height, 1080);
        $this->assertEquals($shader->repeat, '2 2');
        $this->assertEquals($shader->src, 'video-url');
        $this->assertEquals($shader->width, 1920);
    }

    public function test_removeDefaultDOMAttributes()
    {
        $this->assertNull($this->entity->material()
            ->shader('flat')
            ->removeDefaultDOMAttributes());
    }
}
