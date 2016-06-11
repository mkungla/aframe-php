<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 11, 2016 - 1:52:36 AM
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
 * File         Mixin.php
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

final class Mixin
{

    private $ID;

    private $position;

    private $geometry;

    private $material;

    private $light;

    private $attribute;

    private $to;

    private $repeat;

    private $easing;

    private $dur;

    public function __construct($ID)
    {
        $this->ID = $ID;
    }

    /**
     * position
     *
     * @param string $position            
     * @return string <a-mixin prop
     */
    public function position(string $position = NULL)
    {
        if (! empty($position)) {
            $this->position = $position;
        }
        
        return ! empty($this->position) ? sprintf(' position="%s"', $this->position) : '';
    }

    /**
     * geometry
     *
     * @param string $geometry            
     */
    public function geometry(string $geometry = NULL)
    {
        if (! empty($geometry)) {
            $this->geometry = $geometry;
        }
        
        return ! empty($this->geometry) ? sprintf(' geometry="%s"', $this->geometry) : '';
    }

    /**
     * material
     *
     * @param string $material            
     */
    public function material(string $material = NULL)
    {
        if (! empty($material)) {
            $this->material = $material;
        }
        
        return ! empty($this->material) ? sprintf(' material="%s"', $this->material) : '';
    }

    /**
     * light
     *
     * @param string $light            
     */
    public function light(string $light = NULL)
    {
        if (! empty($light)) {
            $this->light = $light;
        }
        
        return ! empty($this->light) ? sprintf(' light="%s"', $this->light) : '';
    }

    /**
     * attribute
     *
     * @param string $attribute            
     */
    public function attribute(string $attribute = NULL)
    {
        if (! empty($attribute)) {
            $this->attribute = $attribute;
        }
        
        return ! empty($this->attribute) ? sprintf(' attribute="%s"', $this->attribute) : '';
    }

    /**
     * to
     *
     * @param string $to            
     */
    public function to(string $to = NULL)
    {
        if (! empty($to)) {
            $this->to = $to;
        }
        
        return ! empty($this->to) ? sprintf(' to="%s"', $this->to) : '';
    }

    /**
     * repeat
     *
     * @param string $repeat            
     */
    public function repeat(string $repeat = NULL)
    {
        if (! empty($repeat)) {
            $this->repeat = $repeat;
        }
        
        return ! empty($this->repeat) ? sprintf(' repeat="%s"', $this->repeat) : '';
    }

    /**
     * easing
     *
     * @param string $easing            
     */
    public function easing(string $easing = NULL)
    {
        if (! empty($easing)) {
            $this->easing = $easing;
        }
        
        return ! empty($this->easing) ? sprintf(' easing="%s"', $this->easing) : '';
    }

    /**
     * dur
     *
     * @param string $dur            
     */
    public function dur(string $dur = NULL)
    {
        if (! empty($dur)) {
            $this->dur = $dur;
        }
        
        return ! empty($this->dur) ? sprintf(' dur="%s"', $this->dur) : '';
    }

    public function getID()
    {
        return $this->ID;
    }
}
 