<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 1:48:03 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         VRmodeUIComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\VRmodeUI;

use \AframeVR\Interfaces\Core\Components\VRmodeUICMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class VRmodeUIComponent extends ComponentAbstract implements VRmodeUICMPTIF
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
        $this->setDomAttribute('vr-mode-ui');
        $this->enabled();
        return true;
    }

    /**
     * look-controls enabled
     *
     * {@inheritdoc}
     *
     * @param bool $enabled            
     * @return VRmodeUICMPTIF
     */
    public function enabled(bool $enabled = true): VRmodeUICMPTIF
    {
        $this->dom_attributes['enabled'] = $enabled ? 'true' : 'false';
        return $this;
    }
    
    /**
     * Does component have DOM Atributes
     *
     * If compnent is called then we return true
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function hasDOMAttributes(): bool
    {
        return true;
    }
}
