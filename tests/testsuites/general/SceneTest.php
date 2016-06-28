<?php

class SceneTest extends PHPUnit_Framework_TestCase
{

    protected $aframe;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->test_output_html = realpath(sys_get_temp_dir()) . DIRECTORY_SEPARATOR . 'aframe-php.html';
    }

    protected function tearDown()
    {
        if (file_exists($this->test_output_html))
            unlink($this->test_output_html);
    }

    public function test_title()
    {
        $default_title = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_title');
        $this->assertEquals('Untitled', $default_title);
        
        $this->aframe->scene()->title('A-Frame PHPUnit test');
        $set_title = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_title');
        $this->assertEquals('A-Frame PHPUnit test', $set_title);
    }

    public function test_description()
    {
        $default_description = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_description');
        $this->assertEquals('', $default_description);
        
        $this->aframe->scene()->description('A-Frame PHPUnit test description');
        $set_description = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_description');
        $this->assertEquals('A-Frame PHPUnit test description', $set_description);
    }

    public function test_rendering()
    {
        /* default $full = true, $print = true */
        ob_start();
        $this->aframe->scene()->render();
        $output = ob_get_clean();
        $this->assertEquals(substr($output, 0, 15), '<!DOCTYPE html>');
        
        /* $full = false, $print = true */
        ob_start();
        $this->aframe->scene()->render(true);
        $output = ob_get_clean();
        $this->assertEquals(substr($output, 0, 9), '<a-scene>');
        
        /* $full = true, $print = false */
        $this->assertEquals(substr($this->aframe->scene()
            ->save(), 0, 15), '<!DOCTYPE html>');
        
        /* $full = false, $print = false */
        $this->assertEquals(substr($this->aframe->scene()
            ->save(true), 0, 9), '<a-scene>');
    }

    public function test_save_file()
    {
        $this->aframe->scene()->save(false, $this->test_output_html);
        
        $this->assertFileExists($this->test_output_html);
    }
}
