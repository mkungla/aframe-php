<?php
use \AframeVR\Tests\CommonTests;

class AnimationTest extends PHPUnit_Framework_TestCase
{
    use CommonTests;

    const A_INSTANCE = 'AframeVR\Core\Animation';

    protected $aframe;
    
    // Setup function to instantiate de object to $this->scrap
    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
    }

    public function a_get_instance()
    {
        return $this->aframe->scene()
            ->entity()
            ->animation();
    }
}
