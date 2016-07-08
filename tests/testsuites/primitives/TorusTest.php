<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;
use \AframeVR\Tests\PrimitiveHelper;
use \AframeVR\Tests\CommonHelper;

class TorusTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{
    use CommonHelper;
    use PrimitiveHelper;

    const A_INSTANCE = 'AframeVR\Core\Entity';

    const A_ALLOWED_CORE_COMPONENTS = array(
        'position',
        'rotation',
        'scale'
    );

    const A_PRIMITIVE_ATTRIBUTES = array(
        'radius',
        'radiusTubular',
        'segmentsRadial',
        'segmentsTubular',
        'arc'
    );

    public function a_get_instance()
    {
        $aframe = new \AframeVR\Aframe();
        return $aframe->scene()->torus();
    }
}
