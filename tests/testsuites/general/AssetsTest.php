<?php
use \AframeVR\Tests\CommonTests;

class AssetsTest extends PHPUnit_Framework_TestCase
{
    use CommonTests;

    const A_INSTANCE = 'AframeVR\Core\Assets';

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    public function a_get_instance()
    {
        return $this->aframe->scene()->assets();
    }

    public function test_mixin()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\MixinInterface', $this->aframe->scene()
            ->assets()
            ->mixin());
    }
}
