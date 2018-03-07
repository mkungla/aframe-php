<?php
use \AframeVR\Tests\CommonHelper;

class ScaleComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $aframe->scene()
            ->entity()
            ->attr('Scale')
                ->scaleX(2);
        $this->component = $aframe->scene()
            ->entity()
            ->attr('Scale');
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Scale\ScaleComponent';

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
        
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        $this->assertInternalType('string', $this->component->getDomAttributeString());
    }

    public function test_getScale()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->scale(1, 2, 6);
        
        $this->assertEquals($aframe->scene()
            ->entity()
            ->attr('Scale')
            ->getScale(), '1 2 6');
    }
}
