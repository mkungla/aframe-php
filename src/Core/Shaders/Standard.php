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
     */
    public $color = '#fff';

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @var unknown
     */
    public $height = '360';

    /**
     * Environment cubemap texture for reflections.
     *
     * Can be a selector to or a comma-separated list of URLs.
     */
    public $envMap = false;

    /**
     * Whether or not material is affected by fog.
     */
    public $fog = true;

    /**
     * How metallic the material is from 0 to 1.
     */
    public $metalness = '0.5';

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     */
    public $repeat = '1 1';

    /**
     * How rough the material is from 0 to 1.
     * A rougher material will scatter
     * reflected light in more directions than a smooth material.
     */
    public $roughness = '0.5';

    /**
     * Width of video (in pixels), if defining a video texture.
     */
    public $width = '640';

    /**
     * Image or video texture map.
     * Can either be a selector to an <img> or <video>, or an inline URL.
     */
    public $src = null;

    public function removeDefaultDOMAttributes()
    {
        $defaults = get_class_vars(get_class($this));
        foreach (get_object_vars($this) as $name => $value) {
            if (empty($value) || (array_key_exists($name, $defaults) && $value === $defaults[$name]))
                unset($this->$name);
        }
    }

    public function color(string $color = '#fff')
    {
        $this->color = $color;
    }

    public function height(string $height = '360')
    {
        $this->height = $height;
    }

    public function envMap($envMap = false)
    {
        $this->envMap = $envMap;
    }

    public function fog(bool $fog = true)
    {
        $this->fog = $fog;
    }

    public function metalness(string $metalness = '0.5')
    {
        $this->metalness = $metalness;
    }

    public function repeat(string $repeat = '1 1')
    {
        $this->repeat = $repeat;
    }

    public function roughness(string $roughness = '0.5')
    {
        $this->roughness = $roughness;
    }

    public function width($width = '640')
    {
        $this->width = $width;
    }

    public function src(string $src = null)
    {
        $this->src = $src;
    }
}
