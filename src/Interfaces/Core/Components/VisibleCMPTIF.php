<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 10:56:16 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         VisibleCMPTIF.php
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
 * Visible Component Interface
 *
 * The visible component defines whether or not an entity is rendered.
 */
interface VisibleCMPTIF extends ComponentInterface
{

    /**
     * Entity visible
     *
     * true The entity will be rendered and visible; the default value.
     * false The entity will not be rendered nor visible. The entity will still exist in the scene.
     *
     * @param bool $visible            
     * @return VisibleCMPTIF
     */
    public function set(bool $visible = true): VisibleCMPTIF;
}