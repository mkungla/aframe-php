<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class VideosphereTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Videosphere';

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
        $this->videosphere = $this->aframe->scene()
            ->videosphere('new-videosphere')-> autoplay();
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->videosphere);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->videosphere);
    }
    
    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $videosphere = $doc->getElementById('new-videosphere');
    
        $this->assertTrue($videosphere->hasAttribute('geometry'));
    
        $this->assertEquals(
            'primitive: sphere; radius: 5000; segmentsHeight: 64; segmentsWidth: 20;',
            $videosphere->getAttribute('geometry'));
        libxml_use_internal_errors(false);
    }
}
