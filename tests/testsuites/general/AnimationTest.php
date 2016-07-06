<?php
use \AframeVR\Tests\CommonHelper;

class AnimationTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    const A_INSTANCE = 'AframeVR\Core\Animation';
    
    const ATTRIBUTES = array(
        'attribute',
        'begin',
        'direction',
        'dur',
        'easing',
        'fill',
        'from',
        'repeat',
        'to'
    );
    
    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    public function a_get_instance()
    {
        return $this->aframe->scene()
            ->entity()
            ->animation();
    }
    
    public function test_animation_attributes()
    {
        $primitive = $this->a_get_instance();
    
        foreach (self::ATTRIBUTES as $attribute) {
            $this->assertTrue(method_exists($primitive, $attribute), sprintf('Class %s should have method %s since this is defined attribute self::A_PRIMITIVE_ATTRIBUTES', get_class($primitive), $attribute));
            $this->assertInstanceOf(self::A_INSTANCE, $this->a_get_instance()
                ->{$attribute}());
        }
    }
}
