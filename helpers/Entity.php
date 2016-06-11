<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 11, 2016 - 3:23:17 AM
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
 * File         Entity.php
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

final class Entity
{

    private $ID;

    private $position;

    private $entities;

    private $attr;

    private $light;

    private $geometry;

    private $material;

    private $scale;

    private $text;

    private $mixin;

    private $rotation;

    public function __construct($ID)
    {
        $this->ID = $ID;
        $this->attr = array();
    }

    /**
     * Entity
     *
     * @param string $ID            
     */
    public function entity(string $ID)
    {
        return $this->entities[$ID] ?? $this->entities[$ID] = new Entity($ID);
    }

    /**
     * position
     *
     * @param string $position            
     * @return string <a-entity prop
     */
    public function position(string $position = NULL)
    {
        if (! empty($position)) {
            $this->position = $position;
        }
        
        return ! empty($this->position) ? sprintf(' position="%s"', $this->position) : '';
    }

    public function attr(string $attr = NULL)
    {
        if (! empty($attr) && ! in_array($attr, $this->attr)) {
            array_push($this->attr, $attr);
        }
        return " " . implode(' ', $this->attr);
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
     * scale
     *
     * @param string $scale            
     */
    public function scale(string $scale = NULL)
    {
        if (! empty($scale)) {
            $this->scale = $scale;
        }
        
        return ! empty($this->scale) ? sprintf(' scale="%s"', $this->scale) : '';
    }

    /**
     * text
     *
     * @param string $text            
     */
    public function text(string $text = NULL)
    {
        if (! empty($text)) {
            $this->text = $text;
        }
        
        return ! empty($this->text) ? sprintf(' text="%s"', $this->text) : '';
    }

    /**
     * rotation
     *
     * @param string $rotation            
     */
    public function rotation(string $rotation = NULL)
    {
        if (! empty($rotation)) {
            $this->rotation = $rotation;
        }
        
        return ! empty($this->rotation) ? sprintf(' rotation="%s"', $this->rotation) : '';
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

    public function getEntities()
    {
        return $this->entities;
    }
}
 