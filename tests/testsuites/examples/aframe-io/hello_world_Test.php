<?php

class hello_world_Test extends PHPUnit_Framework_TestCase
{

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->ex_root_path = dirname(__FILE__, 5) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'examples' . DIRECTORY_SEPARATOR . 'aframe-io' . DIRECTORY_SEPARATOR . 'hello-world';
        $this->ex_page_path = $this->ex_root_path . DIRECTORY_SEPARATOR . 'index.html';
        $this->ex_scene_path = $this->ex_root_path . DIRECTORY_SEPARATOR . 'scene.html';
        $this->aframe = new AframeVR\Aframe();
        
        /* Examples specific configuration */
        $this->aframe->config()->set('formatOutput', true);
        $this->aframe->config()->set('useCDN', true);
        
        /* $aframe->scene(); === Anonymous scene */
        $this->aframe->scene()->title('Hello, World! • A-Frame');
        $this->aframe->scene()->description('Hello, World! • A-Frame');
        
        /* sphere method creates anonymous entity matching primitive sphere */
        $this->aframe->scene()
            ->sphere()
            ->position(0, 1.25, - 1)
            ->radius(1.25)
            ->color('#EF2D5E');
        
        /* box method creates anonymous entity matching primitive box */
        $this->aframe->scene()
            ->box()
            ->position(- 1, 0.5, 1)
            ->rotation(0, 45, 0)
            ->width(1)
            ->height(1)
            ->depth(1)
            ->color('#4CC3D9');
        
        /* cylinder method creates anonymous entity matching primitive cylinder */
        $this->aframe->scene()
            ->cylinder()
            ->position(1, 0.75, 1)
            ->radius(0.5)
            ->height(1.5)
            ->color('#FFC65D');
        
        /* plane method creates anonymous entity matching primitive plane */
        $this->aframe->scene()
            ->plane()
            ->rotation(- 90, 0, 0)
            ->width(4)
            ->height(4)
            ->color('#7BC8A4');
        
        /* sky method creates anonymous entity matching primitive sky */
        $this->aframe->scene()
            ->sky()
            ->color('#000');
    }

    public function test_example_files()
    {
        $this->assertFileExists($this->ex_page_path);
        $this->assertFileExists($this->ex_scene_path);
    }

    public function test_page()
    {
        $this->assertEquals(file_get_contents($this->ex_page_path), $this->aframe->scene()
            ->save());
    }

    public function test_scene()
    {
        $this->assertEquals(file_get_contents($this->ex_scene_path), $this->aframe->scene()
            ->save(true));
    }
}
