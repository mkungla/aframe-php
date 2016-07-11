<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class BoxTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Box';

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
        $this->box = $this->aframe->scene()
            ->box('new-box')
            ->shader('standard')
            ->color('rgb(239,45,94)')
            ->metalness(0.6)
            ->opacity(.4)
            ->roughness(.4)
            ->src('#some-src')
            ->transparent(true)
            ->depth(2)
            ->height(2)
            ->width(2)
            ->segmentsHeight(1)
            ->segmentsWidth(1)
            ->segmentsDepth(1);
        
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->box);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->box);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $box = $doc->getElementById('new-box');
        
        $this->assertTrue($box->hasAttribute('geometry'));
        $this->assertTrue($box->hasAttribute('material'));
        
        $this->assertEquals(
            'primitive: box; depth: 2; height: 2; width: 2; segmentsHeight: 1; segmentsWidth: 1; segmentsDepth: 1;', 
            $box->getAttribute('geometry'));
        $this->assertEquals(
            'shader: standard; opacity: 0.4; transparent: true; color: rgb(239,45,94); metalness: 0.6; roughness: 0.4; src: #some-src;', 
            $box->getAttribute('material'));
        libxml_use_internal_errors(false);
    }
}
