<?php

class ExampleTest extends PHPUnit_Framework_TestCase
{
    protected $aframe;
    
    protected function setUp()
    {
        $this->aframe =  new \AframeVR\Aframe(); 
    }

    public function test_config()
    {

        $this->assertInstanceOf('\AframeVR\Core\Config', $this->aframe->config());
    }
    
    public function test_hello()
    {
        $this->aframe->scene()->dom()->useCDN();
        
        /* $aframe->scene(); === Anonymous scene */
        $this->aframe->scene()->title('Hello, World! • A-Frame');
        $this->aframe->scene()->description('Hello, World! • A-Frame');
        
        /* sphere method creates anonymous entity matching primitive sphere */
        $this->aframe->scene()->sphere()
        ->position(0, 1.25, -1)
        ->radius(1.25)
        ->color('#EF2D5E');
        
        /* box method creates anonymous entity matching primitive box */
        $this->aframe->scene()->box()
        ->position(-1, 0.5, 1)
        ->rotation(0, 45, 0)
        ->width(1)
        ->height(1)
        ->depth(1)
        ->color('#4CC3D9');
        
        /* cylinder method creates anonymous entity matching primitive cylinder */
        $this->aframe->scene()->cylinder()
        ->position(1, 0.75, 1)
        ->radius(0.5)
        ->height(1.5)
        ->color('#FFC65D');
        
        /* plane method creates anonymous entity matching primitive plane */
        $this->aframe->scene()->plane()
        ->rotation(-90, 0, 0)
        ->width(4)
        ->height(4)
        ->color('#7BC8A4');
        
        /* sky method creates anonymous entity matching primitive sky */
        $this->aframe->scene()->sky()
        ->color('#000');
        
        /* Render scene */
        $this->assertInternalType('string',$this->aframe->scene()->save());
    }
}