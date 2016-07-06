<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 29, 2016 - 10:30:29 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ColladaModelCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Collada Model Component Interface (collada-model)
 *
 * The collada-model component loads a 3D model using a COLLADA (.DAE) file.
 */
interface ColladaModelCMPTIF extends ComponentInterface
{

    /**
     * ColladaModel.src
     *
     * Selector to an <a-asset-item>
     * URI to a COLLADA file
     *
     * @param null|string $src            
     * @return ColladaModelCMPTIF
     */
    public function src(string $src = null): ColladaModelCMPTIF;
}