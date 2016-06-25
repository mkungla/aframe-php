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

class Standard implements ShaderInterface
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
     * Remove default attributes
     *
     * @return void
     */
    public function removeDefaultDOMAttributes()
    {
        $defaults = get_class_vars(get_class($this));
        foreach (get_object_vars($this) as $name => $value) {
            if (empty($value) || (array_key_exists($name, $defaults) && $value === $defaults[$name]))
                unset($this->$name);
        }
    }

    /**
     * Base diffuse color
     *
     * @param string $color            
     */
    public function color(string $color = '#fff')
    {
        $this->color = $color;
    }

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @param int $height            
     */
    public function height(int $height = 360)
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
    public function fog(bool $fog = true)
    {
        $this->fog = $fog ? 'true' : 'false';
    }

    /**
     * How metallic the material is from 0 to 1.
     *
     * @param float $metalness            
     */
    public function metalness(float $metalness = 0.5)
    {
        $this->metalness = $metalness;
    }

    /**
     * repeat
     *
     * @param float|int $x            
     * @param float|int $y            
     */
    public function repeat(float $x = 1, float $y = 1)
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
    public function roughness(float $roughness = 0.5)
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
    public function width(int $width = 360)
    {
        $this->width = $width;
    }
}
