<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class CurvedimageTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Curvedimage';

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
        'height',
        'radius',
        'radius',
        'segmentsRadial',
        'segmentsHeight',
        'thetaLength',
        'openEnded',
        'thetaStart'
    );
    protected $aframe;
    protected $curvedimage;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->aframe->scene()
            ->curvedimage('new-curvedimage')
            ->component('Geometry')
            ->primitive('cylinder')
            ->height(1)
            ->radius(1)
            ->segmentsRadial(36)
            ->segmentsHeight(18)
            ->thetaLength(90)
            ->openEnded(true)
            ->thetaStart(135);
        $this->aframe->scene()
            ->curvedimage('new-curvedimage')
            ->component('Material')
            ->shader('standard')
            ->color('#000')
            ->metalness(0)
            ->opacity(1)
            ->repeat(0, 0)
            ->roughness(0.5)
            ->side('double')
            ->src('$src-selector')
            ->transparent(true);
        $this->curvedimage = $this->aframe->scene()
            ->curvedimage('new-curvedimage');
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->curvedimage);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->curvedimage);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $curvedimage = $doc->getElementById('new-curvedimage');
        
        $this->assertTrue($curvedimage->hasAttribute('geometry'));
        $this->assertTrue($curvedimage->hasAttribute('material'));
        
        $this->assertEquals(
            'primitive: cylinder; height: 1; radius: 1; segmentsRadial: 36; segmentsHeight: 18; thetaLength: 90; openEnded: true; thetaStart: 135;', 
            $curvedimage->getAttribute('geometry'));
        $this->assertEquals(
            'shader: standard; opacity: 1; side: double; transparent: true; color: #000; repeat: 0 0; src: $src-selector;', 
            $curvedimage->getAttribute('material'));
        libxml_use_internal_errors(false);
    }
}
