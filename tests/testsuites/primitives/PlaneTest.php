<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;
use \AframeVR\Tests\PrimitiveTests;
use \AframeVR\Tests\CommonTests;

class PlaneTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{
    use CommonTests;
    use PrimitiveTests;

    const A_INSTANCE = 'AframeVR\Core\Entity';

    const A_ALLOWED_CORE_COMPONENTS = array(
        'position',
        'rotation',
        'scale'
    );
    
    const A_PRIMITIVE_ATTRIBUTES = array(
        'height',
        'width'
    );
    
    public function a_get_instance()
    {
        $aframe = new \AframeVR\Aframe();
        return $aframe->scene()->plane();
    }
}
