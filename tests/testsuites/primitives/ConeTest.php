<?php

use \AframeVR\Tests\CommonHelper;

class ConeTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;


    const A_INSTANCE = 'AframeVR\Core\Entity';

    const A_ALLOWED_CORE_COMPONENTS = array(
        'position',
        'rotation',
        'scale'
    );


    public function a_get_instance()
    {
        $aframe = new \AframeVR\Aframe();
        return $aframe->scene()->cone();
    }
    
    public function test_scene()
    {
        $aframe = new \AframeVR\Aframe();
        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Cone', $aframe->scene()->cone());
    }
}
