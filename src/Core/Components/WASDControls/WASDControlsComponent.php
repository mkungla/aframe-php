<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 3:21:00 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         WASDControlsComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\WASDControls;

use \AframeVR\Core\Helpers\ComponentAbstract;

class WASDControlsComponent extends ComponentAbstract
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
        $this->setDomAttribute('wasd-controls');
        return true;
    }
    
    /**
     * wasd-controls enabled
     *
     * Whether the WASD controls are enabled.
     *
     * @param bool $enabled
     * @return void
     */
    public function enabled(bool $enabled = true)
    {
        $this->dom_attributes['enabled'] = $enabled ? 'true' : 'false';
    }
}
