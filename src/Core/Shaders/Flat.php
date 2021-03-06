<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 2:19:19 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Flat.php
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

class Flat extends ShaderAbstract implements ShaderInterface
{
    /**
     * Shader
     *
     * @var string
     */
    protected $shader = 'flat';
    
    /**
     * Base diffuse color.
     *
     * @var string $color
     */
    protected $color = '#fff';
    
    /**
     * Whether or not material is affected by fog.
     *
     * @var string $fog
     */
    protected $fog = 'true';
    
    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @var int $height
     */
    protected $height = 360;
    
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
        $this->fog(true);
        $this->height(360);
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
     * Whether or not material is affected by fog.
     *
     * @param bool $fog            
     */
    public function fog(bool $fog)
    {
        $this->fog = $fog ? 'true' : 'false';
        return $this;
    }

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @param int $height            
     */
    public function height(int $height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     *
     * @param null|string $src            
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
