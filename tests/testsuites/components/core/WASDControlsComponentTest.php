<?php
use \AframeVR\Tests\CommonHelper;

class WASDControlsComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->WASDControls();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\WASDControls\WASDControlsComponent';

    public function a_get_instance()
    {
        return $this->component;
    }
    
    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->WASDControls()
            ->acceleration();

        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->WASDControls()
            ->getDomAttributeString()
        );
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        
    }

    public function test_props()
    {
        $this->component->acceleration(100);
        $this->component->adAxis('x');
        $this->component->adInverted();
        $this->component->easing();
        $this->component->fly();
        $this->component->wsAxis();
        $this->component->wsInverted();
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('acceleration', $attrs);
        $this->assertArrayHasKey('adAxis', $attrs);
        $this->assertArrayHasKey('adInverted', $attrs);
        $this->assertArrayHasKey('easing', $attrs);
        $this->assertArrayHasKey('fly', $attrs);
        $this->assertArrayHasKey('wsAxis', $attrs);
        $this->assertArrayHasKey('wsInverted', $attrs);
    }
}
