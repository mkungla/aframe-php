<?php

class StandardShaderTest extends PHPUnit_Framework_TestCase
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
            ->shader('standard')
            ->color('#000');
        $this->entity->material()
            ->shader('standard')
            ->fog(false);
        $this->entity->material()
            ->shader('standard')
            ->height(1080);
        $this->entity->material()
            ->shader('standard')
            ->repeat(2, 2);
        $this->entity->material()
            ->shader('standard')
            ->src('video-url');
        $this->entity->material()
            ->shader('standard')
            ->width(1920);
        $this->entity->material()
            ->shader('standard')
            ->envMap('#env-map');
        
        $shader = $this->entity->material()->shader('standard');
        
        $this->assertEquals($shader->color, '#000');
        $this->assertEquals($shader->fog, 'false');
        $this->assertEquals($shader->height, 1080);
        $this->assertEquals($shader->repeat, '2 2');
        $this->assertEquals($shader->src, 'video-url');
        $this->assertEquals($shader->width, 1920);
        $this->assertEquals($shader->envMap, '#env-map');
    }

    public function test_properties2()
    {
        $this->entity->material()
            ->shader('standard')
            ->color('#fff');
        $this->entity->material()
            ->shader('standard')
            ->fog(true);
        $this->entity->material()
            ->shader('standard')
            ->height(100);
        $this->entity->material()
            ->shader('standard')
            ->repeat(5, 2);
        $this->entity->material()
            ->shader('standard')
            ->src('video-uri');
        $this->entity->material()
            ->shader('standard')
            ->width(20);
        $this->entity->material()
            ->shader('standard')
            ->envMap('#env-map-2');
        
        $shader = $this->entity->material()->shader('standard');
        
        $this->assertEquals($shader->color, '#fff');
        $this->assertEquals($shader->fog, 'true');
        $this->assertEquals($shader->height, 100);
        $this->assertEquals($shader->repeat, '5 2');
        $this->assertEquals($shader->src, 'video-uri');
        $this->assertEquals($shader->width, 20);
        $this->assertEquals($shader->envMap, '#env-map-2');
    }

    public function test_removeDefaultDOMAttributes()
    {
        $this->assertNull($this->entity->material()
            ->shader('standard')
            ->removeDefaultDOMAttributes());
    }
}
