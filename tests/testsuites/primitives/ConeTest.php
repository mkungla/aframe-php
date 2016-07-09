<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class ConeTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Cone';

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
        'openEnded',
        'radiusBottom',
        'radiusTop',
        'segmentsHeight',
        'segmentsRadial',
        'thetaLength',
        'thetaStart'
    );
    protected $aframe;
    protected $circle;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->cone = $this->aframe->scene()
            ->cone('new-cone')
            ->height(1)
            ->openEnded(false)
            ->radiusBottom(1)
            ->radiusTop(0.8)
            ->segmentsHeight(18)
            ->segmentsRadial(36)
            ->thetaLength(360)
            ->thetaStart(0);
        ;
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->cone);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->cone);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $cone = $doc->getElementById('new-cone');
        
        $this->assertTrue($cone->hasAttribute('geometry'));
        
        $this->assertEquals(
            'primitive: cone; height: 1; openEnded: false; radiusBottom: 1; radiusTop: 0.8; segmentsHeight: 18; segmentsRadial: 36; thetaLength: 360; thetaStart: 0;', 
            $cone->getAttribute('geometry'));
        libxml_use_internal_errors(false);
    }
}