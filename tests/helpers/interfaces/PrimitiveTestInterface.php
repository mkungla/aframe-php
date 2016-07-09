<?php
namespace AframeVR\Tests\interfaces;

interface PrimitiveTestInterface
{

    /**
     * Test instance og returned object
     *
     * You have to define class test class constant A_INSTANCE.
     * Ex for primitive: A_INSTANCE = 'AframeVR\Core\Entity'
     */
    public function test_instance();

    /**
     * Test dom object
     */
    public function test_dom();

}
