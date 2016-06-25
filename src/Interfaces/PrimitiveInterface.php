<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 11:45:19 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         PrimitiveInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces;

interface PrimitiveInterface
{

    /**
     * Init
     *
     * Primitve init called from entir=ty constructor must load all components for this primitive
     * Ex: $this->component('Position')
     *
     * @return void
     */
    public function init();

    /**
     * defaults
     *
     * Defaults method is called in primitvie constructor to set
     * primitives default values for loaded components.
     *
     * @return void
     */
    public function defaults();
}

 