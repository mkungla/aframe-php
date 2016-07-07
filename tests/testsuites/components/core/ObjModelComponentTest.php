<?php
use \AframeVR\Tests\CommonHelper;

class ObjModelComponentTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    protected $component;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $aframe = new \AframeVR\Aframe();
        $this->component = $aframe->scene()
            ->entity()
            ->objModel();
    }

    const A_INSTANCE = '\AframeVR\Core\Components\ObjModel\ObjModelComponent';

    public function a_get_instance()
    {
        return $this->component;
    }
    
    public function test_general()
    {
        $aframe = new \AframeVR\Aframe();
        
        $aframe->scene()
            ->entity()
            ->objModel()
            ->obj('#tree-obj')->mtl('#tree-mtl');

        
        $this->assertInternalType('string', $aframe->scene()
            ->entity()
            ->objModel()
            ->getDomAttributeString()
        );
        $this->assertInternalType('array', $this->component->getDOMAttributesArray());
        
        
    }

    public function test_props()
    {
        $this->component->obj('#tree-obj');
        $this->component->mtl('#tree-mtl');


        
        $attrs = $this->component->getDOMAttributesArray();
        
        $this->assertArrayHasKey('obj', $attrs);
        $this->assertArrayHasKey('mtl', $attrs);
    }
}
