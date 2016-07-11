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
            ->src('video-url');
        $this->entity->material()
            ->shader('standard')
            ->width(1920);
        $this->entity->material()
            ->shader('standard')
            ->envMap('#env-map');
        
        $shader = $this->entity->material()->shader('standard');
        
        $this->assertAttributeEquals('#000','color',$shader);
        $this->assertAttributeEquals('false','fog',$shader);
        $this->assertAttributeEquals(1080,'height',$shader);

        $this->assertAttributeEquals('video-url','src',$shader);
        $this->assertAttributeEquals(1920,'width',$shader);
        $this->assertAttributeEquals('#env-map','envMap',$shader);
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
            ->src('video-uri');
        $this->entity->material()
            ->shader('standard')
            ->width(20);
        $this->entity->material()
            ->shader('standard')
            ->envMap('#env-map-2');
        
        $shader = $this->entity->material()->shader('standard');
        
        $this->assertAttributeEquals('#fff','color',$shader);
        $this->assertAttributeEquals('true','fog',$shader);
        $this->assertAttributeEquals(100,'height',$shader);

        $this->assertAttributeEquals('video-uri','src',$shader);
        $this->assertAttributeEquals(20,'width',$shader);
        $this->assertAttributeEquals('#env-map-2','envMap',$shader);
        
        $shader->defaults();
    }

    public function test_removeDefaultDOMAttributes()
    {
        $this->assertNotNull($this->entity->material()
            ->shader('standard')
            ->removeDefaultDOMAttributes());
    }
}
