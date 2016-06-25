<?php
use \AframeVR\Tests\CommonTests;

class ScaleComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonTests;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->component('Scale');
    }

    const A_INSTANCE = '\AframeVR\Components\Scale';

    public function a_get_instance()
    {
        return $this->component;
    }

    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->scale(1, 5, 6);
        
        $this->assertInternalType('array', $this->component->getScripts());
        
        $aframe->scene()->render(true, false);
    }
}
