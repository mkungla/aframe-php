<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 11, 2016 - 4:18:08 AM
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
 * File         Animation.php
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

final class Animation
{

    private $ID;

    private $mixin;

    public function __construct($ID)
    {
        $this->ID = $ID;
    }

    /**
     * mixin
     *
     * @param string $mixin            
     */
    public function mixin(string $mixin = NULL)
    {
        if (! empty($mixin)) {
            $this->mixin = $mixin;
        }
        
        return ! empty($this->mixin) ? sprintf(' mixin="%s"', $this->mixin) : '';
    }
}