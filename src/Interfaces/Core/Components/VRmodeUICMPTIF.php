<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 10:59:36 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         VRmodeUICMPTIF.php
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
 * VRmodeUI Component Interface (vr-mode-ui)
 *
 * The vr-mode-ui component toggles UI such as an Enter VR button, compatibility modal, and orientation modal for
 * mobile. The vr-mode-ui component applies only to the <a-scene> element.
 */
interface VRmodeUICMPTIF extends ComponentInterface
{

    /**
     * Enable vr-mode-ui
     *
     * Whether or not to display UI related to entering VR.
     *
     * @param bool $enabled            
     * @return VRmodeUICMPTIF
     */
    public function enabled(bool $enabled = true): VRmodeUICMPTIF;
}