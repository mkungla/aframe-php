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
}