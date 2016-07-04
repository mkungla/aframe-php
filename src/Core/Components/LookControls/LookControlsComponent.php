<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 3:14:06 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         LookControlsComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\LookControls;

use \AframeVR\Interfaces\Core\Components\LookControls\LookControlsInterface;
use \AframeVR\Core\Helpers\ComponentAbstract;

class LookControlsComponent extends ComponentAbstract implements LookControlsInterface
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
        $this->setDomAttribute('look-controls');
        return true;
    }

    /**
     * look-controls enabled
     * 
     * {@inheritdoc}
     * 
     * @param bool $enabled
     * @return LookControlsInterface
     */
    public function enabled(bool $enabled = true): LookControlsInterface
    {
        $this->dom_attributes['enabled'] = $enabled ? 'true' : 'false';
        return $this;
    }
}
