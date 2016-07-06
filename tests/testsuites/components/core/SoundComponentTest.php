<?php
use \AframeVR\Tests\CommonHelper;

class SoundComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->sound();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Sound\SoundComponent';

    public function a_get_instance()
    {
        return $this->component;
    }
    
    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->sound()
            ->autoplay();

        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->sound()
            ->getDomAttributeString()
        );
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        
    }

    public function test_props()
    {
        $this->component->autoplay(true);
        $this->component->on('move');
        $this->component->loop(true);
        $this->component->src('path');
        $this->component->volume(.5);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('autoplay', $attrs);
        $this->assertArrayHasKey('on', $attrs);
        $this->assertArrayHasKey('loop', $attrs);
        $this->assertArrayHasKey('src', $attrs);
        $this->assertArrayHasKey('volume', $attrs);
    }
}
