<?php
use \AframeVR\Tests\CommonTests;

class PositionComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonTests;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->component('Position');
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Position\Component';

    public function a_get_instance()
    {
        return $this->component;
    }

    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->position(1, 5, 6);
        
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        $this->assertEmpty($this->component->getComponentScripts());
        
        $this->component->addComponentScripts("vendor/component","script.js");
        $this->assertNotEmpty($this->component->getComponentScripts());
        
        $aframe->scene()->render(true, false);
    }
}
