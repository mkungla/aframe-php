<?php
use \AframeVR\Tests\CommonTests;

class GeometryComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonTests;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->component('Geometry');
    }

    const A_INSTANCE = '\AframeVR\Components\Geometry';

    public function a_get_instance()
    {
        return $this->component;
    }

    public function test_dependencies()
    {
        $this->assertInternalType('array', $this->component->getScripts());
    }

    public function test_non_primitive()
    {
        $this->setExpectedException('\AframeVR\Core\Exceptions\InvalidComponentArgumentException');
        
        $this->component->primitive('InvalidPrimtive');
        $this->assertFalse($this->component->isPrimitiveMethod('width'));
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
        
        $this->assertAttributeEquals(2, 'width', $this->component);
        $this->assertAttributeEquals(2, 'height', $this->component);
        $this->assertAttributeEquals(2, 'depth', $this->component);
        $this->assertAttributeEquals('1 2 3', 'translate', $this->component);
        $this->assertAttributeEquals('false', 'buffer', $this->component);
        $this->assertAttributeEquals('true', 'skipCache', $this->component);
    }

    public function test_primitive_circle()
    {
        $this->component->primitive('circle');
        $this->component->radius(2);
        $this->component->segments(64);
        $this->component->thetaStart(90);
        $this->component->thetaLength(180);
        
        $this->assertAttributeEquals(2, 'radius', $this->component);
        $this->assertAttributeEquals(64, 'segments', $this->component);
        $this->assertAttributeEquals(90, 'thetaStart', $this->component);
        $this->assertAttributeEquals(180, 'thetaLength', $this->component);
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
        
        $this->assertAttributeEquals(5, 'height', $this->component);
        $this->assertAttributeEquals('false', 'openEnded', $this->component);
        $this->assertAttributeEquals(1.5, 'radiusBottom', $this->component);
        $this->assertAttributeEquals(1.5, 'radiusTop', $this->component);
        $this->assertAttributeEquals(72, 'segmentsRadial', $this->component);
        $this->assertAttributeEquals(36, 'segmentsHeight', $this->component);
        $this->assertAttributeEquals(90, 'thetaStart', $this->component);
        $this->assertAttributeEquals(180, 'thetaLength', $this->component);
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
        
        $this->assertAttributeEquals(2, 'radius', $this->component);
        $this->assertAttributeEquals(2, 'height', $this->component);
        $this->assertAttributeEquals(72, 'segmentsRadial', $this->component);
        $this->assertAttributeEquals(36, 'segmentsHeight', $this->component);
        $this->assertAttributeEquals('false', 'openEnded', $this->component);
        $this->assertAttributeEquals(90, 'thetaStart', $this->component);
        $this->assertAttributeEquals(180, 'thetaLength', $this->component);
    }

    public function test_primitive_plane()
    {
        $this->component->primitive('plane');
        $this->component->height(2);
        $this->component->width(2);
        
        $this->assertAttributeEquals(2, 'width', $this->component);
        $this->assertAttributeEquals(2, 'height', $this->component);
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
        
        $this->assertAttributeEquals(2, 'radiusInner', $this->component);
        $this->assertAttributeEquals(2, 'radiusOuter', $this->component);
        $this->assertAttributeEquals(64, 'segmentsTheta', $this->component);
        $this->assertAttributeEquals(16, 'segmentsPhi', $this->component);
        $this->assertAttributeEquals(90, 'thetaStart', $this->component);
        $this->assertAttributeEquals(180, 'thetaLength', $this->component);
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
        
        $this->assertAttributeEquals(2, 'radius', $this->component);
        $this->assertAttributeEquals(72, 'segmentsHeight', $this->component);
        $this->assertAttributeEquals(36, 'segmentsWidth', $this->component);
        $this->assertAttributeEquals(0, 'phiStart', $this->component);
        $this->assertAttributeEquals(360, 'phiLength', $this->component);
        $this->assertAttributeEquals(90, 'thetaStart', $this->component);
        $this->assertAttributeEquals(270, 'thetaLength', $this->component);
    }

    public function test_primitive_torus()
    {
        $this->component->primitive('torus');
        $this->component->radius(2);
        $this->component->radiusTubular(0.4);
        $this->component->segmentsRadial(72);
        $this->component->segmentsTubular(64);
        $this->component->arc(360);
        
        $this->assertAttributeEquals(2, 'radius', $this->component);
        $this->assertAttributeEquals(0.4, 'radiusTubular', $this->component);
        $this->assertAttributeEquals(72, 'segmentsRadial', $this->component);
        $this->assertAttributeEquals(64, 'segmentsTubular', $this->component);
        $this->assertAttributeEquals(360, 'arc', $this->component);
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
        
        $this->assertAttributeEquals(2, 'radius', $this->component);
        $this->assertAttributeEquals(0.4, 'radiusTubular', $this->component);
        $this->assertAttributeEquals(72, 'segmentsRadial', $this->component);
        $this->assertAttributeEquals(64, 'segmentsTubular', $this->component);
        $this->assertAttributeEquals(2, 'p', $this->component);
        $this->assertAttributeEquals(3, 'q', $this->component);
    }
}
