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
 * File         FogCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components\ascene;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Fog Component Interface
 *
 * The fog component obscures entities in fog given distance from the camera. The fog component applies only to the
 * <a-scene> element.
 */
interface FogCMPTIF extends ComponentInterface
{

    /**
     * Fog type
     *
     * Type of fog distribution. Can be linear or exponential.
     *
     * @param string $type            
     * @return FogCMPTIF
     */
    public function type(string $type = 'linear'): FogCMPTIF;

    /**
     * Fog color
     *
     * Color of fog. For example, if set to black, far away objects will be rendered black.
     *
     * @param string $color            
     * @return FogCMPTIF
     */
    public function color(string $color = '#000'): FogCMPTIF;
    
    /**
     * Fog near
     *
     * Minimum distance to start applying fog. Objects closer than this won’t be affected by fog.
     *
     * @param int $near
     * @return FogCMPTIF
     */
    public function near(int $near = 1): FogCMPTIF;
    
    /**
     * Fog far
     *
     * Maximum distance to stop applying fog. Objects farther than this won’t be affected by fog.
     *
     * @param int $far
     * @return FogCMPTIF
     */
    public function far(int $far = 1000): FogCMPTIF;
    
    /**
     * Fog density
     *
     * How quickly the fog grows dense.
     *
     * @param float $density
     * @return FogCMPTIF
     */
    public function density(float $density = 0.00025): FogCMPTIF;
}