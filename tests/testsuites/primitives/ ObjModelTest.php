<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class ObjModelTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\ObjModel';

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
        'depth',
        'height',
        'width'
    );
    protected $aframe;
    protected $box;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->objmodel = $this->aframe->scene()
            ->objmodel('new-objmodel')
            ->obj('.obj')->mtl('.mdl');
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->objmodel);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->objmodel);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $objmodel = $doc->getElementById('new-objmodel');
        
        $this->assertTrue($objmodel->hasAttribute('obj-model'));
        
        $this->assertEquals(
            'obj: .obj; mtl: .mdl;', 
            $objmodel->getAttribute('obj-model'));
        libxml_use_internal_errors(false);
    }
}
 