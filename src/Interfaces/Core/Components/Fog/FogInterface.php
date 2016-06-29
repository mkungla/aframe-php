<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 29, 2016 - 10:42:59 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         FogInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components\Fog;

use \AframeVR\Interfaces\ComponentInterface;

interface FogInterface extends ComponentInterface
{

    /**
     * Fog type
     *
     * Type of fog distribution. Can be linear or exponential.
     *
     * @param string $type            
     * @return void
     */
    public function type(string $type = 'linear');

    /**
     * Fog color
     *
     * Color of fog. For example, if set to black, far away objects will be rendered black.
     *
     * @param string $color            
     * @return void
     */
    public function color(string $color = '#000');
}
