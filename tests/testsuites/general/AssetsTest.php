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
        $this->aframe->config()->set('format_output', true);
    }

    public function a_get_instance()
    {
        return $this->aframe->scene()->asset();
    }

    public function test_assets()
    {
        $this->assertInstanceOf('AframeVR\Core\Assets', 
            $this->aframe->scene()
                ->asset()
                ->timeout());
    }

    public function test_audio()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetAudioInterface', 
            $this->aframe->scene()
                ->asset()
                ->audio()
                ->autoplay()
                ->preload());
    }

    public function test_img()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetImageInterface', 
            $this->aframe->scene()
                ->asset()
                ->img()
                ->src('#src')
                ->crossorigin());
    }

    public function test_item()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetItemInterface', 
            $this->aframe->scene()
                ->asset()
                ->item());
    }

    public function test_video()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\AssetVideoInterface', 
            $this->aframe->scene()
                ->asset()
                ->video(10)
                ->autoplay()
                ->preload()
                ->loop()
                ->crossorigin());
        
        $this->aframe->scene()->save();
    }

    public function test_mixin()
    {
        $this->assertInstanceOf('AframeVR\Interfaces\Core\Assets\MixinInterface', 
            $this->aframe->scene()
                ->asset()
                ->mixin());
        
        $this->aframe->scene()
            ->asset()
            ->mixin('mix-id')
            ->color('#000')
            ->metalness()
            ->roughness()
            ->translate()
            ->opacity()
            ->transparent()
            ->shader()
            ->src('#mix-src')
            ->component('Light')
            ->angle(60);
        
        $this->aframe->scene()->save();
    }
}
