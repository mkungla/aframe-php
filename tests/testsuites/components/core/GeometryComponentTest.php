<?php
use \AframeVR\Tests\CommonHelper;

class GeometryComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->component('Geometry');
    }

    const A_INSTANCE = '\AframeVR\Core\Components\Geometry\Component';

    public function a_get_instance()
    {
        return $this->component;
    }

    public function test_dependencies()
    {
        $this->assertInternalType('array', $this->component->getComponentScripts());
    }

    public function test_non_primitive()
    {
        $this->setExpectedException('\AframeVR\Core\Exceptions\InvalidComponentArgumentException');
        
        $this->component->primitive('InvalidPrimtive');
        $this->assertFalse($this->component->isPrimitiveMethod('width'));
    }

    public function test_getDomAttributes()
    {
        $this->component->primitive('box');
        $this->component->width(2);
        $this->component->height(2);
        $this->assertInternalType('string', $this->component->getDomAttributeString());
    }

    public function test_primitive_box()
    {
        $this->component->primitive('box');
        $this->component->width(2);
        $this->component->height(2);
        $this->component->depth(2);
        $this->component->translate(1, 2, 3);
        $this->component->buffer(false);
        $this->component->skipCache(true);
        
        $attrs = $this->component->getDOMAttributesArray();
        $this->assertArrayHasKey('width', $attrs);
        $this->assertArrayHasKey('height', $attrs);
        $this->assertArrayHasKey('depth', $attrs);
        $this->assertArrayHasKey('translate', $attrs);
        $this->assertArrayHasKey('buffer', $attrs);
        $this->assertArrayHasKey('skipCache', $attrs);
    }

    public function test_primitive_circle()
    {
        $this->component->primitive('circle');
        $this->component->radius(2);
        $this->component->segments(64);
        $this->component->thetaStart(90);
        $this->component->thetaLength(180);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('radius', $attrs);
        $this->assertArrayHasKey('segments', $attrs);
        $this->assertArrayHasKey('thetaStart', $attrs);
        $this->assertArrayHasKey('thetaLength', $attrs);
    }

    public function test_primitive_cone()
    {
        $this->component->primitive('cone');
        $this->component->height(5);
        $this->component->openEnded(false);
        $this->component->radiusBottom(1.5);
        $this->component->radiusTop(1.5);
        $this->component->segmentsRadial(72);
        $this->component->segmentsHeight(36);
        $this->component->thetaStart(90);
        $this->component->thetaLength(180);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('height', $attrs);
        $this->assertArrayHasKey('openEnded', $attrs);
        $this->assertArrayHasKey('radiusBottom', $attrs);
        $this->assertArrayHasKey('radiusTop', $attrs);
        $this->assertArrayHasKey('segmentsRadial', $attrs);
        $this->assertArrayHasKey('segmentsHeight', $attrs);
        $this->assertArrayHasKey('thetaStart', $attrs);
        $this->assertArrayHasKey('thetaLength', $attrs);
    }

    public function test_primitive_cylinder()
    {
        $this->component->primitive('cylinder');
        $this->component->radius(2);
        $this->component->height(2);
        $this->component->segmentsRadial(72);
        $this->component->segmentsHeight(36);
        $this->component->openEnded(false);
        $this->component->thetaStart(90);
        $this->component->thetaLength(180);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('radius', $attrs);
        $this->assertArrayHasKey('height', $attrs);
        $this->assertArrayHasKey('segmentsRadial', $attrs);
        $this->assertArrayHasKey('segmentsHeight', $attrs);
        $this->assertArrayHasKey('openEnded', $attrs);
        $this->assertArrayHasKey('thetaStart', $attrs);
        $this->assertArrayHasKey('thetaLength', $attrs);
    }

    public function test_primitive_plane()
    {
        $this->component->primitive('plane');
        $this->component->height(2);
        $this->component->width(2);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('width', $attrs);
        $this->assertArrayHasKey('height', $attrs);
    }

    public function test_primitive_ring()
    {
        $this->component->primitive('ring');
        $this->component->radiusInner(2);
        $this->component->radiusOuter(2);
        $this->component->segmentsTheta(64);
        $this->component->segmentsPhi(16);
        $this->component->thetaStart(90);
        $this->component->thetaLength(180);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('radiusInner', $attrs);
        $this->assertArrayHasKey('radiusOuter', $attrs);
        $this->assertArrayHasKey('segmentsTheta', $attrs);
        $this->assertArrayHasKey('segmentsPhi', $attrs);
        $this->assertArrayHasKey('thetaStart', $attrs);
        $this->assertArrayHasKey('thetaLength', $attrs);
    }

    public function test_primitive_sphere()
    {
        $this->component->primitive('sphere');
        $this->component->radius(2);
        $this->component->segmentsHeight(72);
        $this->component->segmentsWidth(36);
        $this->component->phiStart(0);
        $this->component->phiLength(360);
        $this->component->thetaStart(90);
        $this->component->thetaLength(270);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('radius', $attrs);
        $this->assertArrayHasKey('segmentsHeight', $attrs);
        $this->assertArrayHasKey('segmentsWidth', $attrs);
        $this->assertArrayHasKey('phiStart', $attrs);
        $this->assertArrayHasKey('phiLength', $attrs);
        $this->assertArrayHasKey('thetaStart', $attrs);
        $this->assertArrayHasKey('thetaLength', $attrs);
    }

    public function test_primitive_torus()
    {
        $this->component->primitive('torus');
        $this->component->radius(2);
        $this->component->radiusTubular(0.4);
        $this->component->segmentsRadial(72);
        $this->component->segmentsTubular(64);
        $this->component->arc(360);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('radius', $attrs);
        $this->assertArrayHasKey('radiusTubular', $attrs);
        $this->assertArrayHasKey('segmentsRadial', $attrs);
        $this->assertArrayHasKey('segmentsTubular', $attrs);
        $this->assertArrayHasKey('arc', $attrs);
    }

    public function test_primitive_torusKnot()
    {
        $this->component->primitive('torusKnot');
        $this->component->radius(2);
        $this->component->radiusTubular(0.4);
        $this->component->segmentsRadial(72);
        $this->component->segmentsTubular(64);
        $this->component->p(2);
        $this->component->q(3);
        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('radius', $attrs);
        $this->assertArrayHasKey('radiusTubular', $attrs);
        $this->assertArrayHasKey('segmentsRadial', $attrs);
        $this->assertArrayHasKey('segmentsTubular', $attrs);
        $this->assertArrayHasKey('p', $attrs);
        $this->assertArrayHasKey('q', $attrs);
    }
}
