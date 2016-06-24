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
     * Return instance which should be used for test_instance
     */
    public function a_get_instance();

    /**
     * Test allowed core comonents
     *
     * You have to define class test class constant A_ALLOWED_CORE_COMPONENTS.
     * Ex for primitive: A_ALLOWED_COMPONENTS = array('position','rotation','material','geometry');
     */
    public function test_core_components();

    /**
     * Attributes which methods have to be present for this primitive
     */
    public function test_primitive_attributes();
}
