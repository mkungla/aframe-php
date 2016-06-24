<?php

class PrimitivesTest extends PHPUnit_Framework_TestCase
{

    public function test_primitives_render()
    {
        $aframe = new \AframeVR\Aframe();
        
        /* sphere method creates anonymous entity matching primitive sphere */
        $aframe->scene()->sphere();
        
        /* box method creates anonymous entity matching primitive box */
        $aframe->scene()->box();
        
        /* cylinder method creates anonymous entity matching primitive cylinder */
        $aframe->scene()->cylinder();
        
        /* plane method creates anonymous entity matching primitive plane */
        $aframe->scene()->plane();
        
        /* sky method creates anonymous entity matching primitive sky */
        $aframe->scene()->sky();
        
        $this->assertInternalType('string', $aframe->scene()
            ->render(true, false));
    }
}
