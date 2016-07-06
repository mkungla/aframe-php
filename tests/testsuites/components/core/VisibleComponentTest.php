<?php
use \AframeVR\Tests\CommonHelper;

class VisibleComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->visible();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Visible\VisibleComponent';

    public function a_get_instance()
    {
        return $this->component;
    }
    
    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->visible();

        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->visible()
            ->getDomAttributeString()
        );
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        $aframe->scene()->save();
    }
}
