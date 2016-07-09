<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class SkyTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Sky';

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
        $this->sky = $this->aframe->scene()
            ->sky('new-sky');
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->sky);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->sky);
    }
    
    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $sky = $doc->getElementById('new-sky');
    
        $this->assertTrue($sky->hasAttribute('geometry'));
    
        $this->assertEquals(
            'primitive: sphere; radius: 100; segmentsHeight: 20; segmentsWidth: 64;',
            $sky->getAttribute('geometry'));
        libxml_use_internal_errors(false);
    }
}
