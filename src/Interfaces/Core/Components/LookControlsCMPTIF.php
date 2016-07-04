<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 8:00:54 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         LookControlsCMPTIF.php
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
 * Look Controls Component Interface (look-controls)
 *
 * The look-controls component defines the following behavior of an entity. The look-controls component acts upon the
 * HMD headset, mouse, and touchscreen inputs. A-Frame standard controls are grouped together based upon configuration
 * and behavior rather than by individual input methods:
 *
 * - Rotate when the head-mounted display (HMD) is rotated.
 * - Rotate when the mouse is clicked and dragged.
 * - Rotate when the touchscreen is tapped and dragged.
 */
interface LookControlsCMPTIF extends ComponentInterface
{

    /**
     * look-controls enabled
     *
     * Whether look controls are enabled.
     *
     * @param bool $enabled            
     * @return LookControlsCMPTIF
     */
    public function enabled(bool $enabled = true): LookControlsCMPTIF;
}