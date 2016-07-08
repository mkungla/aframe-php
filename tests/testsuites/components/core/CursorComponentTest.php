<?php
use \AframeVR\Tests\CommonHelper;

class CursorComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;
    
    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->cursor();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Cursor\CursorComponent';

    public function a_get_instance()
    {
        return $this->component;
    }
    
    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        
        $aframe->scene()
            ->entity()
            ->cursor();

        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->cursor()
            ->getDomAttributeString()
        );
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        
    }

    public function test_props()
    {
        $this->component->fuse(false);
        $this->component->fuseTimeout(100);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('fuse', $attrs);
        $this->assertArrayHasKey('fuseTimeout', $attrs);
    }
}
