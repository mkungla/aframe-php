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

class Flat extends ShaderAbstract implements ShaderInterface
{

    /**
     * Base diffuse color.
     *
     * @var string $color
     */
    public $color = '#fff';

    /**
     * Whether or not material is affected by fog.
     *
     * @var string $fog
     */
    public $fog = 'true';

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @var int $height
     */
    public $height = 360;

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     *
     * @var string $repeat
     */
    public $repeat = '1 1';

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
     * Base diffuse color
     *
     * @param string $color            
     */
    public function color(string $color = '#fff')
    {
        $this->color = $color;
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
     * Height of video (in pixels), if defining a video texture.
     *
     * @param int $height            
     */
    public function height(int $height = 360)
    {
        $this->height = $height;
    }

    /**
     *
     * @param int|float $x            
     * @param int|float $y            
     */
    public function repeat(float $x = 1, float $y = 1)
    {
        $this->repeat = sprintf('%d %d', $x, $y);
    }

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     *
     * @param null|string $src            
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
    
    /**
     * removeDefaultDOMAttributes
     *
     * @return void
     */
    public function removeDefaultDOMAttributes()
    {
        $defaults = $this->getShaderClassDefaultVars();
        foreach ($this as $name => $value) {
            if (empty($value) || $value === $defaults[$name])
                unset($this->$name);
        }
    }
}
