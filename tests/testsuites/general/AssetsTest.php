<?php
use \AframeVR\Tests\CommonHelper;

class AssetsTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    const A_INSTANCE = 'AframeVR\Core\Assets';

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    public function a_get_instance()
    {
        return $this->aframe->scene()->asset();
    }

    public function test_item()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\ItemInterface', $this->aframe->scene()
            ->asset()
            ->item());
    }

    public function test_mixin()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\MixinInterface', $this->aframe->scene()
            ->asset()
            ->mixin());
    }
}
