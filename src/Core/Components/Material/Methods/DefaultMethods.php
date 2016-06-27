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
namespace AframeVR\Core\Components\Material\Methods;

class DefaultMethods
{

    /**
     * opacity
     *
     * Extent of transparency. If the transparent property is not true,
     * then the material will remain opaque and opacity will only affect color.
     *
     * @param &array $dom_attributes            
     * @param float $opacity            
     * @return void
     */
    public function opacity(array &$dom_attributes, float $opacity = 1.0)
    {
        $dom_attributes['opacity'] = $opacity;
    }

    /**
     * transparent
     *
     * Whether material is transparent. Transparent entities are rendered after non-transparent entities.
     *
     * @param &array $dom_attributes            
     * @param bool|string $transparent            
     * @return void
     */
    public function transparent(array &$dom_attributes, bool $transparent = false)
    {
        $dom_attributes['transparent'] = $transparent ? 'true' : 'false';
    }

    /**
     * Which sides of the mesh to render.
     * Can be one of front, back, or double
     *
     * @param &array $dom_attributes            
     * @param string $side            
     * @return void
     */
    public function side(array &$dom_attributes, string $side = 'front')
    {
        $dom_attributes['side'] = $side;
    }
}
