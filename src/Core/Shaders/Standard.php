<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 1:53:21 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Standard.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Shaders;

use \AframeVR\Interfaces\ShaderInterface;
use \AframeVR\Core\Helpers\ShaderAbstract;

class Standard extends ShaderAbstract implements ShaderInterface
{

    /**
     * Base diffuse color.
     *
     * @var string $color
     */
    public $color = '#fff';

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @var int $height
     */
    public $height = 360;

    /**
     * Environment cubemap texture for reflections.
     *
     * Can be a selector to or a comma-separated list of URLs.
     *
     * @var string|null $envMap
     */
    public $envMap = null;

    /**
     * Whether or not material is affected by fog.
     *
     * @var string $fog
     */
    public $fog = 'true';

    /**
     * How metallic the material is from 0 to 1.
     *
     * @var float $metalness
     */
    public $metalness = 0.5;

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     *
     * @var string $repeat
     */
    public $repeat = '1 1';

    /**
     * How rough the material is from 0 to 1.
     * A rougher material will scatter
     * reflected light in more directions than a smooth material.
     *
     * @var float $roughness
     */
    public $roughness = 0.5;

    /**
     * Image or video texture map.
     * Can either be a selector to an <img> or <video>, or an inline URL.
     *
     * @var string|null $src
     */
    public $src = null;

    /**
     * Width of video (in pixels), if defining a video texture.
     *
     * @var int $width
     */
    public $width = 640;

    /**
     * Construct and set shader defaults
     */
    public function __construct()
    {
        $this->color('#fff');
        $this->height(360);
        $this->envMap();
        $this->fog(true);
        $this->metalness(0.5);
        $this->repeat(1, 1);
        $this->roughness(0.5);
        $this->src();
        $this->width(640);
    }

    /**
     * Base diffuse color
     *
     * @param string $color            
     */
    public function color(string $color)
    {
        $this->color = $color;
    }

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @param int $height            
     */
    public function height($height)
    {
        $this->height = $height;
    }

    /**
     * envMap
     *
     * Environment cubemap texture for reflections.
     * Can be a selector to or a comma-separated list of URLs.
     *
     * @param string|null $envMap            
     */
    public function envMap(string $envMap = null)
    {
        $this->envMap = $envMap;
    }

    /**
     * Whether or not material is affected by fog.
     *
     * @param bool $fog            
     */
    public function fog($fog)
    {
        $this->fog = $fog ? 'true' : 'false';
    }

    /**
     * How metallic the material is from 0 to 1.
     *
     * @param float $metalness            
     */
    public function metalness($metalness)
    {
        $this->metalness = $metalness;
    }

    /**
     * repeat
     *
     * @param float $x            
     * @param float $y            
     */
    public function repeat(float $x, float $y)
    {
        $this->repeat = sprintf('%d %d', $x, $y);
    }

    /**
     * How rough the material is from 0 to 1
     *
     * A rougher material will scatter reflected light in more directions than a smooth material.
     *
     * @param float $roughness            
     */
    public function roughness(float $roughness)
    {
        $this->roughness = $roughness;
    }

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     *
     * @param string|null $src            
     */
    public function src(string $src = null)
    {
        $this->src = $src;
    }

    /**
     * Width of video (in pixels), if defining a video texture.
     *
     * @param int $width            
     */
    public function width(int $width)
    {
        $this->width = $width;
    }
}
