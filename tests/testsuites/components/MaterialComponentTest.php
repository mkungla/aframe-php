<?php
use \AframeVR\Tests\CommonTests;

class MaterialComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonTests;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->material();
    }

    const A_INSTANCE = '\AframeVR\Components\Material';

    public function a_get_instance()
    {
        return $this->component;
    }

    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->material()
            ->shader()
            ->color('#000');
        $aframe->scene()
            ->entity()
            ->material()
            ->opacity(.5);
        
        $this->assertInternalType('array', $this->component->getScripts());
        
        $aframe->scene()->render(true, false);
    }

    public function test_props()
    {
        $this->component->opacity(2);
        $this->component->transparent(true);
        $this->component->side('front');
        
        $this->assertAttributeEquals(2, 'opacity', $this->component);
        $this->assertAttributeEquals('true', 'transparent', $this->component);
        $this->assertAttributeEquals('front', 'side', $this->component);
    }
}
