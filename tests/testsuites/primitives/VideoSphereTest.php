<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

use \AframeVR\Tests\CommonHelper;

class VideoSphereTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{
    use CommonHelper;
    

    const A_INSTANCE = 'AframeVR\Core\Entity';

    const A_ALLOWED_CORE_COMPONENTS = array(
        'position',
        'rotation',
        'scale'
    );

    const A_PRIMITIVE_ATTRIBUTES = array(
        'radius',
        'autoplay',
        'segmentsHeight',
        'segmentsWidth'
    );

    protected static $mesh_attributes = array(

    );
    
    /**
     * Test is instance
     */
    public function test_core_components()
    {
        foreach (self::A_ALLOWED_CORE_COMPONENTS as $component_name) {
            $this->assertInstanceOf(self::A_INSTANCE, $this->a_get_instance()
                ->$component_name());
        }
    }
    

    
    public function test_primitive_attributes()
    {
        $primitive = $this->a_get_instance();
    
        foreach (self::A_PRIMITIVE_ATTRIBUTES as $attribute) {
            $this->assertTrue(method_exists($primitive, $attribute), sprintf('Class %s should have method %s since this is defined attribute self::A_PRIMITIVE_ATTRIBUTES', get_class($primitive), $attribute));
            $this->assertInstanceOf(self::A_INSTANCE, $this->a_get_instance()
                ->{$attribute}());
        }
    }
    
    public function a_get_instance()
    {
        $aframe = new \AframeVR\Aframe();
        return $aframe->scene()->videosphere();
    }
}
