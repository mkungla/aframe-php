<?php
use \AframeVR\Tests\CommonHelper;

class AssetsTest extends PHPUnit_Framework_TestCase
{
    use CommonHelper;

    const A_INSTANCE = 'AframeVR\Core\Asset';

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

    public function test_mixin()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\MixinInterface', $this->aframe->scene()
            ->asset()
            ->mixin());
    }
}
