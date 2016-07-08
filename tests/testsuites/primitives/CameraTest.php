<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;
use \AframeVR\Tests\CommonHelper;

class CameraTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{
    use CommonHelper;

    const A_INSTANCE = 'AframeVR\Core\Entity';

    const A_ALLOWED_CORE_COMPONENTS = array(
        'position',
        'rotation'
    );

    const A_PRIMITIVE_ATTRIBUTES = array(
        'active',
        'far',
        'fov',
        'lookControls',
        'near',
        'wasdControls',
        'zoom'
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
        
        $this->assertInstanceOf('AframeVR\Extras\Primitives\Cursor', $this->a_get_instance()
            ->cursor());
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
        return $aframe->scene()->camera();
    }
}
