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

class Flat implements ShaderInterface
{

    /**
     * Base diffuse color.
     */
    public $color = '#fff';

    /**
     * Whether or not material is affected by fog.
     */
    public $fog = true;

    /**
     * Height of video (in pixels), if defining a video texture.
     *
     * @var unknown
     */
    public $height = '360';

    /**
     * How many times a texture (defined by src) repeats in the X and Y direction.
     */
    public $repeat = '1 1';

    /**
     * Image or video texture map.
     * Can either be a selector to an <img> or <video>, or an inline URL.
     */
    public $src = false;

    /**
     * Width of video (in pixels), if defining a video texture.
     */
    public $width = '640';

    public function removeDefaultDOMAttributes()
    {
        $defaults = get_class_vars(get_class($this));
        foreach (get_object_vars($this) as $name => $value) {
            if (empty($value) || (array_key_exists($name, $defaults) && $value === $defaults[$name]))
                unset($this->$name);
        }
    }
}
