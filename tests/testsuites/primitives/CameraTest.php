<?php
use \AframeVR\Tests\interfaces\PrimitiveTestInterface;

class CameraTest extends PHPUnit_Framework_TestCase implements PrimitiveTestInterface
{

    const A_INSTANCE = 'AframeVR\Extras\Primitives\Camera';

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
        'active',
        'far',
        'fov',
        'near',
        'zoom',
        'lookcontrols',
        'wasdcontrols',
        'cursor'
    );
    protected $aframe;
    protected $camera;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->camera = $this->aframe->scene()
            ->camera('new-camera')
            ->active(true)
            ->far(10000)
            ->fov(80)
            ->lookcontrols(true)
            ->near(0.5)
            ->wasdcontrols(true)
            ->zoom(1)
            ->cursor(1);
    }

    public function test_instance()
    {
        $this->assertInstanceOf(self::A_INSTANCE, $this->camera);
        $this->assertInstanceOf('AframeVR\Core\Entity', $this->camera);
    }

    public function test_dom()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $dom = $doc->loadHTML($this->aframe->scene()->save(true));
        $camera = $doc->getElementById('new-camera');
        $camera_child = $camera->getElementsByTagName('a-entity')[0];
        $this->assertTrue($camera_child->hasAttribute('camera'));
        $this->assertTrue($camera_child->hasAttribute('look-controls'));
        $this->assertTrue($camera_child->hasAttribute('wasd-controls'));
        
        $this->assertEquals('active: true; far: 10000; fov: 80; near: 0.5; zoom: 1;', 
            $camera_child->getAttribute('camera'));
        $this->assertEquals('enabled: true;', $camera_child->getAttribute('look-controls'));
        $this->assertEquals('enabled: true;', $camera_child->getAttribute('wasd-controls'));
        libxml_use_internal_errors(false);
    }
}