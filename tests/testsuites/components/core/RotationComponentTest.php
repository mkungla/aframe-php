<?php
use \AframeVR\Tests\CommonHelper;

class RotationComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->component('Rotation');
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Rotation\RotationComponent';

    public function a_get_instance()
    {
        return $this->component;
    }

    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->rotation(1, 5, 6);
        
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        $this->assertInternalType('string', $this->component->getDomAttributeString());
    }

    public function test_getPosition()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->rotation(10, - 5, 6);
        
        $this->assertEquals($aframe->scene()
            ->entity()
            ->component('Rotation')
            ->getRotation(), '10 -5 6');
    }
}
