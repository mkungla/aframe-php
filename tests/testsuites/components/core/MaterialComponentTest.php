<?php
use \AframeVR\Tests\CommonHelper;

class MaterialComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->material();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Material\Component';

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
            ->opacity(0.5);
        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->material()->getDomAttributeString());
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        
    }

    public function test_props()
    {
        $this->component->opacity(2);
        $this->component->transparent(true);
        $this->component->side('front');
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('opacity', $attrs);
        $this->assertArrayHasKey('transparent', $attrs);
        $this->assertArrayHasKey('side', $attrs);
    }
}
