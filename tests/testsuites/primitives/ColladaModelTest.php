<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class ColladaModelTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\ColladaModel';

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
        'rotation',
        'scale',
        'src'
    );
    protected $aframe;
    protected $colladamodel;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->colladamodel = $this->aframe->scene()
            ->colladamodel('new-colladamodel')
            ->rotation(100, 110, 120)
            ->scale(2, 3, 4)
            ->src('#collada-selector');
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->colladamodel);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->colladamodel);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $wrapper = $doc->getElementById('new-colladamodel');
        $collada_model = $wrapper->getElementsByTagName('a-entity')[0];
        $this->assertTrue($collada_model->hasAttribute('rotation'));
        $this->assertTrue($collada_model->hasAttribute('scale'));
        $this->assertTrue($collada_model->hasAttribute('collada-model'));
        
        $this->assertEquals('100 110 120', $collada_model->getAttribute('rotation'));
        $this->assertEquals('2 3 4', $collada_model->getAttribute('scale'));
        $this->assertEquals('#collada-selector', $collada_model->getAttribute('collada-model'));
        libxml_use_internal_errors(false);
    }
}