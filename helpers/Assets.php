<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 11, 2016 - 1:36:05 AM
 * Contact      marko.kungla@gmail.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * Package name    aframe-php
 * @category       mkungla
 * @package        aframe
 * @subpackage     php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Assets.php
 * Code format  PSR-2
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko.kungla@gmail.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace Aframe\helpers;

final class Assets
{

    private $mixins = array();

    private $images = array();

    public function mixin(string $ID)
    {
        return $this->mixins[$ID] ?? $this->mixins[$ID] = new Mixin($ID);
    }

    public function img(string $ID, string $src)
    {
        return $this->images[$ID] ?? $this->images[$ID] = new Img($ID, $src);
    }

    public function getMixins()
    {
        return $this->mixins;
    }

    public function getImages()
    {
        return $this->images;
    }
}
 