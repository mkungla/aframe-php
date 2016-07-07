<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 4:12:47 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ObjModelComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\ObjModel;

use \AframeVR\Interfaces\Core\Components\ObjModelCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class ObjModelComponent extends ComponentAbstract implements ObjModelCMPTIF
{

    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('obj-model');
        return true;
    }

    /**
     * Selector to obj
     *
     * Selector to an <a-asset-item> pointing to a .OBJ file or an inline path to a .OBJ file.
     *
     * @param string $selector
     * @return ObjModelCMPTIF
     */
    public function obj(string $selector): ObjModelCMPTIF
    {
        $this->dom_attributes['obj'] = $selector;
        return $this;
    }
    
    /**
     * Selector to mtl
     *
     * Selector to an <a-asset-item> pointing to a .MTL file or an inline path to a .MTL file. Optional if you wish to
     * use the material component instead.
     *
     * @param string $selector
     * @return ObjModelCMPTIF
     */
    public function mtl(string $selector): ObjModelCMPTIF
    {
        $this->dom_attributes['mtl'] = $selector;
        return $this;
    }
}
