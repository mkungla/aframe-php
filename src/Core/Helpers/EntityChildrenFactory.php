<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 5, 2016 - 3:05:38 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         EntityChildrenFactory.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Helpers;

use \AframeVR\Core\Entity;
use \AframeVR\Core\Exceptions\BadPrimitiveCallException;

class EntityChildrenFactory
{
    /**
     * Child entities
     *
     * @var array
     */
    protected $childrens = array();

    /**
     * Entity
     *
     * @api
     *
     * @param string $id            
     * @return \AframeVR\Core\Entity
     */
    public function entity(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Entity($id);
    }

    /**
     * Call
     *
     * @param string $method
     * @param array $args
     * @throws BadShaderCallException
     * @return Entity|\AframeVR\Interfaces\ComponentInterface
     */
    public function __call(string $method, array $args)
    {
        $id        = $args[0] ?? 'untitled';
        $primitive = sprintf('\AframeVR\Extras\Primitives\%s',  ucfirst($method));
    
        if (class_exists($primitive)) {
            return $this->childrens[$id] ?? $this->childrens[$id] = new $primitive($id);
        } else {
            throw new BadPrimitiveCallException($method);
        }
    }
    
    public function getChildern()
    {
        return $this->childrens;
    }
}