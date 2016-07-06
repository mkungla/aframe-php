<?php
use \AframeVR\Tests\CommonHelper;

class CanvasComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->canvas();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Canvas\CanvasComponent';

    public function a_get_instance()
    {
        return $this->component;
    }
    
    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->canvas();

        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->canvas()
            ->getDomAttributeString()
        );
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        
    }

    public function test_props()
    {
        $this->component->canvas('selector');
        $this->component->height(100);
        $this->component->width(100);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('canvas', $attrs);
        $this->assertArrayHasKey('height', $attrs);
        $this->assertArrayHasKey('width', $attrs);
        
    }
}
