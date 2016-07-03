<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 3, 2016 - 8:36:14 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         MockComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Helpers;

final class MockComponent
{
    /**
     * Record all menthod / args to be called when mixin is used on some entity
     *
     * @var array
     */
    protected $component_methods = array();
    
    /**
     * Call passes all calls to no existing methods to self::methodProvider
     *
     * @param string $method
     * @param array $args
     * @throws InvalidComponentMethodException
     * @return object
     */
    public function __call(string $method, $args)
    {
        $this->component_methods[$method] = $args;
        return $this;
    }
}
