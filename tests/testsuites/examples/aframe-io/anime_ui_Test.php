<?php

class anime_ui_Test extends PHPUnit_Framework_TestCase
{

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->ex_root_path = dirname(__FILE__, 5) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'examples' . DIRECTORY_SEPARATOR . 'aframe-io' . DIRECTORY_SEPARATOR . 'anime-ui';
        $this->ex_page_path = $this->ex_root_path . DIRECTORY_SEPARATOR . 'index.html';
        $this->ex_scene_path = $this->ex_root_path . DIRECTORY_SEPARATOR . 'scene.html';
        $aframe = new AframeVR\Aframe();
        
        /* Examples specific configuration */
        $aframe->config()->set('formatOutput', true);
        $aframe->config()->set('useCDN', true);
        
        /* $aframe->scene(); === Anonymous scene */
        $aframe->scene()->title('Anime UI');
        $aframe->scene()->description('Anime UI — A-Frame');
        
        $aframe->scene()
            ->asset()
            ->item('engine')
            ->src('models/engine.dae');
        
        $aframe->scene()
            ->asset()
            ->item('ss')
            ->src('models/engine.dae');
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
