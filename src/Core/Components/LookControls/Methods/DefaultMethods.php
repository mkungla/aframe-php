<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 3:17:34 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         DefaultMethods.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\LookControls\Methods;

class DefaultMethods
{
    /**
     * look-controls enabled
     *
     * Whether look controls are enabled.
     *
     * @param array $dom_attributes
     * @param bool $enabled
     * @return void
     */
    public function enabled(array &$dom_attributes, bool $enabled = true)
    {
        $dom_attributes['enabled'] = $enabled;
    }
}
