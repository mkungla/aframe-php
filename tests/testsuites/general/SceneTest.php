<?php

class SceneTest extends PHPUnit_Framework_TestCase
{

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    /**
     * Test is instance
     */
    public function test_instance()
    {
        $this->assertInstanceOf('AframeVR\Core\Scene', $this->aframe->scene());
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
        $this->aframe->scene()->render(false);
        $output = ob_get_clean();
        $this->assertEquals(substr($output, 0, 9), '<a-scene>');
        
        /* $full = true, $print = false */
        $this->assertEquals(substr($this->aframe->scene()
            ->render(true, false), 0, 15), '<!DOCTYPE html>');
        
        /* $full = false, $print = false */
        $this->assertEquals(substr($this->aframe->scene()
            ->render(false, false), 0, 9), '<a-scene>');
    }

    public function test_metaTags()
    {
        $title = "Test Title";
        $this->aframe->scene()
            ->meta()
            ->title($title);
        
        $description = "Test Description";
        $this->aframe->scene()
            ->meta()
            ->description($description);
        
        $charset = "utf-8";
        $this->aframe->scene()
            ->meta()
            ->charset($charset);
        
        $this->assertFalse($this->aframe->scene()
            ->meta()
            ->removeTag('invalidTag'));
        
    }
}