<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 2:54:40 AM
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
namespace AframeVR\Core\Components\Scale\Methods;

class DefaultMethods
{
    /**
     * When any scale component methods are called then init others
     * 
     * @param array $dom_attributes
     * @return void
     */
    private function init(array &$dom_attributes)
    {
        $dom_attributes['x'] = $dom_attributes['x'] ?? 0;
        $dom_attributes['y'] = $dom_attributes['y'] ?? 0;
        $dom_attributes['z'] = $dom_attributes['z'] ?? 0;
    }

    /**
     * Scaling factor in the X direction.
     *
     * @param array $dom_attributes            
     * @param double $scale_x            
     * @return void
     */
    public function scaleX(array &$dom_attributes, float $scale_x)
    {
        $this->init($dom_attributes);
        $dom_attributes['x'] = $scale_x;
    }

    /**
     * Scaling factor in the Y direction..
     *
     * @param array $dom_attributes            
     * @param double $scale_y            
     * @return void
     */
    public function scaleY(array &$dom_attributes, float $scale_y)
    {
        $this->init($dom_attributes);
        $dom_attributes['y'] = $scale_y;
    }

    /**
     * Scaling factor in the Z direction.
     *
     * @param array $dom_attributes            
     * @param double $scale_z            
     * @return void
     */
    public function scaleZ(array &$dom_attributes, float $scale_z)
    {
        $this->init($dom_attributes);
        $dom_attributes['z'] = $scale_z;
    }
}
