<?php

class anime_ui_Test extends PHPUnit_Framework_TestCase
{

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->ex_root_path = dirname(__FILE__, 6) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 
            'examples' . DIRECTORY_SEPARATOR . 'aframe-io' . DIRECTORY_SEPARATOR . 'showcase' . DIRECTORY_SEPARATOR . 'anime-UI';
        $this->ex_page_path = $this->ex_root_path . DIRECTORY_SEPARATOR . 'index.html';
        $this->ex_scene_path = $this->ex_root_path . DIRECTORY_SEPARATOR . 'scene.html';
        $aframe = new AframeVR\Aframe();

        /* Examples specific configuration */
        $aframe->config()->set('format_output', true)
            ->set('use_cdn', true);
        
        /* $aframe->scene(); === Anonymous scene */
        $aframe->scene()->title('Anime UI');
        $aframe->scene()->description('Anime UI — A-Frame');
        
        $aframe->scene()->asset()->item('engine')
            ->src('models/engine.dae');
        
        $aframe->scene()->asset()->mixin('image')
            ->geometry()
                ->height(2)
                ->width(2);
        
        /* You can set Assets url as relative to scene url */
        $aframe->scene()->asset()->audio('blip1')
            ->src('audio/321103__nsstudios__blip1.wav');
        
        $aframe->scene()->asset()->audio('blip2')
            ->src('audio/321104__nsstudios__blip2.wav');
             
        $aframe->scene()->asset()->img('glow1')
            ->src('img/glow1.png');
        
        $aframe->scene()->asset()->img('ring1')
            ->src('img/ring1.png');
        $aframe->scene()->asset()->img('ring2')
            ->src('img/ring2.png');
        $aframe->scene()->asset()->img('ring3')
            ->src('img/ring3.png');
        $aframe->scene()->asset()->img('ring4')
            ->src('img/ring4.png');
        $aframe->scene()->asset()->img('ring5')
            ->src('img/ring5.png');
        
        $aframe->scene()->asset()->img('schematic1')
            ->src('img/schematic1.png');
        $aframe->scene()->asset()->img('schematic2')
            ->src('img/schematic2.png');
        $aframe->scene()->asset()->img('schematic3')
            ->src('img/schematic3.png');
        $aframe->scene()->asset()->img('schematic4')
            ->src('img/schematic4.png');
        $aframe->scene()->asset()->img('schematic5')
            ->src('img/schematic5.png');
            
        $aframe->scene()->asset()->img('text1')
            ->src('img/text1.png');
        $aframe->scene()->asset()->img('text2')
            ->src('img/text2.png');
        $aframe->scene()->asset()->img('text3')
            ->src('img/text3.png');
        $aframe->scene()->asset()->img('text4')
            ->src('img/text4.png');
        
        $this->aframe = $aframe;
    }

    public function test_example_files()
    {
        $this->assertFileExists($this->ex_page_path);
        $this->assertFileExists($this->ex_scene_path);
    }

    public function test_page()
    {
        $this->assertStringEqualsFile($this->ex_page_path, $this->aframe->scene()
            ->save());
    }

    public function test_scene()
    {
        $this->assertStringEqualsFile($this->ex_scene_path, $this->aframe->scene()
            ->save(true));
    }
}
