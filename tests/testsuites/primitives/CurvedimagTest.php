<?php
use \AframeVR\Tests\CommonHelper;

class CurvedimageTest extends PHPUnit_Framework_TestCase 
{
    use CommonHelper;

    const A_INSTANCE = 'AframeVR\Core\Entity';

    const A_ALLOWED_CORE_COMPONENTS = array(
        'position',
        'rotation',
        'scale'
    );



    protected static $mesh_attributes = array(
        'color',
        'src',
        'translate',
        'shader',
        'opacity',
        'transparent'
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
    
    public function test_mesh_attributes()
    {
        $primitive = $this->a_get_instance();
    
        foreach (self::$mesh_attributes as $attribute) {
            $this->assertTrue(method_exists($primitive, $attribute), sprintf('Class %s should have method %s since this is defined attribute self::A_MESH_ATTRIBUTES', get_class($primitive), $attribute));
            $this->assertInstanceOf(self::A_INSTANCE, $this->a_get_instance()
                ->{$attribute}());
        }
    }
    

    
    public function a_get_instance()
    {
        $aframe = new \AframeVR\Aframe();
        return $aframe->scene()->curvedimage();
    }
}
