<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class LightTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Light';

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
        $this->light = $this->aframe->scene()
            ->light('new-light')
            ->angle(60)
            ->color('#fff')
            ->groundColor('#fff')
            ->decay(1)
            ->distance(0.0)
            ->exponent(10)
            ->intensity(1.0)
            ->penumbra(0)
            ->type('directional');
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->light);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->light);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $light = $doc->getElementById('new-light');
        
        $this->assertTrue($light->hasAttribute('light'));
        
        $this->assertEquals(
            'angle: 60; color: #fff; groundColor: #fff; decay: 1; distance: 0; exponent: 10; intensity: 1; penumbra: 0; type: directional;', 
            $light->getAttribute('light'));
        libxml_use_internal_errors(false);
    }
}
