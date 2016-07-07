<?php
use \AframeVR\Tests\CommonHelper;

class RaycasterComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->raycaster();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Raycaster\RaycasterComponent';

    public function a_get_instance()
    {
        return $this->component;
    }
    
    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->raycaster()
            ->interval(200);

        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->raycaster()
            ->getDomAttributeString()
        );
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        
    }

    public function test_props()
    {
        $this->component->far(200);
        $this->component->interval(500);
        $this->component->near(100);
        $this->component->objects('.objects');
        $this->component->recursive(false);

        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('far', $attrs);
        $this->assertArrayHasKey('interval', $attrs);
        $this->assertArrayHasKey('near', $attrs);
        $this->assertArrayHasKey('objects', $attrs);
        $this->assertArrayHasKey('recursive', $attrs);
    }
}
