<?php 
class SceneTest extends PHPUnit_Framework_TestCase
{

	/**
	 * Test is instance
	 */
	public function test_instance()
	{
		$aframe = new AframeVR\Aframe();
		$this->assertInstanceOf('AframeVR\Core\Scene', $aframe->scene());
		
	}
	
	public function test_rendering()
	{
	    $aframe = new AframeVR\Aframe();
	    
	    /* default $full = true, $print = true */
	    ob_start();
	    $aframe->scene()->render();
	    $output = ob_get_clean();
	    $this->assertEquals(substr($output,0,15),'<!DOCTYPE html>');
	    
	    /* $full = false, $print = true */
	    ob_start();
	    $aframe->scene()->render(false);
	    $output = ob_get_clean();
	    $this->assertEquals(substr($output,0,9),'<a-scene>');
	    
	    /* $full = true, $print = false */
	    $this->assertEquals(substr($aframe->scene()->render(true,false),0,15),'<!DOCTYPE html>');
	    
	    /* $full = false, $print = false */
	    $this->assertEquals(substr($aframe->scene()->render(false,false),0,9),'<a-scene>');
	}
}