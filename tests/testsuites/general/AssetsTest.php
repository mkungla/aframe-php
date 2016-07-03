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

    public function test_assets()
    {
        $this->assertInstanceOf('AframeVR\Core\Assets', $this->aframe->scene()
            ->asset()
            ->timeout());
    }

    public function test_audio()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetAudioInterface', $this->aframe->scene()
            ->asset()
            ->audio()
            ->autoplay()
            ->preload());
    }

    public function test_img()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetImageInterface', $this->aframe->scene()
            ->asset()
            ->img()
            ->crossorigin());
    }

    public function test_item()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetItemInterface', $this->aframe->scene()
            ->asset()
            ->item());
    }

    public function test_video()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetVideoInterface', $this->aframe->scene()
            ->asset()
            ->video()
            ->autoplay()
            ->preload()
            ->crossorigin());
    }

    public function test_mixin()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\MixinInterface', $this->aframe->scene()
            ->asset()
            ->mixin());
    }
}
