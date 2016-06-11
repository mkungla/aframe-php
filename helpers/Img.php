<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 11, 2016 - 2:41:54 AM
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
 * File         Img.php
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

final class Img
{

    private $ID;

    private $src;

    public function __construct($ID, $src = '')
    {
        $this->ID = $ID;
        $this->src = $src;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getSRC()
    {
        return $this->src;
    }
}
 