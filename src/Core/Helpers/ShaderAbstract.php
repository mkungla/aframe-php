<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 25, 2016 - 8:48:28 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ShaderAbstract.php
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

abstract class ShaderAbstract
{

    /**
     * Get default class vars
     *
     * @return array
     */
    protected function getShaderClassDefaultVars()
    {
        return get_class_vars(get_class($this));
    }

    /**
     * removeDefaultDOMAttributes
     *
     * @return void
     */
    public function removeDefaultDOMAttributes()
    {
        $defaults = $this->getShaderClassDefaultVars();
        $vars     = get_object_vars($this);
        
        foreach ($vars as $name => $value) {
            if ($name === 'shader')
                continue;
            
            if (empty($value) || $value === $defaults[$name]) {
                unset($this->$name);
            }
        }
    }

    public function getAttributes()
    {
        $this->removeDefaultDOMAttributes();
        return get_object_vars($this);
    }
}
