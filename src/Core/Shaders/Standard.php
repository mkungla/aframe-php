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
 * @issues      https://github.com/mkungla/aframe-php/issues
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
     * Shader
     *
     * @var string
     */
    protected $shader = 'standard';
    
    /**
     * Base diffuse color.
     *
     * @var string $color
     */
    protected $color = '#fff';
    
    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @var int $height
     */
    protected $height = 360;
    
    /**
     * Environment cubemap texture for reflections.
     *
     * Can be a selector to or a comma-separated list of URLs.
     *
     * @var string|null $envMap
     */
    protected $envMap = null;
    
    /**
     * Whether or not material is affected by fog.
     *
     * @var string $fog
     */
    protected $fog = 'true';
    
    /**
     * How metallic the material is from 0 to 1.
     *
     * @var float $metalness
     */
    protected $metalness = 0.5;
    
    
    /**
     * How rough the material is from 0 to 1.
     * A rougher material will scatter
     * reflected light in more directions than a smooth material.
     *
     * @var float $roughness
     */
    protected $roughness = 0.5;
    
    /**
     * Image or video texture map.
     * Can either be a selector to an <img> or <video>, or an inline URL.
     *
     * @var string|null $src
     */
    protected $src = null;
    
    /**
     * Width of video (in pixels), if defining a video texture.
     *
     * @var int $width
     */
    protected $width = 640;

    /**
     * Set shader defaults
     *
     * @return void
     */
    public function defaults()
    {
        $this->color('#fff');
        $this->height(360);
        $this->envMap();
        $this->fog(true);
        $this->metalness(0.5);
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
        return $this;
    }

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @param int $height            
     */
    public function height($height)
    {
        $this->height = $height;
        return $this;
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
        return $this;
    }

    /**
     * Whether or not material is affected by fog.
     *
     * @param bool $fog            
     */
    public function fog($fog)
    {
        $this->fog = $fog ? 'true' : 'false';
        return $this;
    }

    /**
     * How metallic the material is from 0 to 1.
     *
     * @param float $metalness            
     */
    public function metalness($metalness)
    {
        $this->metalness = $metalness;
        return $this;
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
        return $this;
    }

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     *
     * @param string|null $src            
     */
    public function src(string $src = null)
    {
        $this->src = $src;
        return $this;
    }

    /**
     * Width of video (in pixels), if defining a video texture.
     *
     * @param int $width            
     */
    public function width(int $width)
    {
        $this->width = $width;
        return $this;
    }
}
