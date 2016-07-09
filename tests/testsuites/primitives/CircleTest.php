<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class CircleTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Circle';

    const A_PRIMITIVE_ATTRIBUTES = array(
        /* Mesh attriburtes */
        'color',
        'metalness',
        'opacity',
        'roughness',
        'shader',
        'src',
        'translate',
        'transparent',
        /* Box primitive attributes */
        'radius',
        'segments',
        'thetaLength',
        'thetaStart'
    );
    protected $aframe;
    protected $circle;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->circle = $this->aframe->scene()
            ->circle('new-circle')
            ->radius(1)
            ->segments(32)
            ->thetaLength(360)
            ->thetaStart(0);
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->circle);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->circle);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $circle = $doc->getElementById('new-circle');
        
        $this->assertTrue($circle->hasAttribute('geometry'));
        
        $this->assertEquals('primitive: circle; radius: 1; segments: 32; thetaLength: 360; thetaStart: 0;', 
            $circle->getAttribute('geometry'));
        libxml_use_internal_errors(false);
    }
}