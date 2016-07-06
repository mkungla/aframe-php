<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 1:12:24 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CursorComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Cursor;

use \AframeVR\Interfaces\Core\Components\CursorCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class CursorComponent extends ComponentAbstract implements CursorCMPTIF
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
        $this->setDomAttribute('cursor');
        $this->fuseTimeout();
        return true;
    }
    
    /**
     * Whether cursor is fuse-based.
     *
     * {@inheritdoc}
     *
     * @param bool $fuse            
     * @return CursorCMPTIF
     */
    public function fuse(bool $fuse = false): CursorCMPTIF
    {
        $this->dom_attributes['fuse'] = $fuse;
        return $this;
    }

    /**
     * fuseTimeout
     *
     * {@inheritdoc}
     *
     * @param int $timeout            
     * @return CursorCMPTIF
     */
    public function fuseTimeout(int $timeout = 1500): CursorCMPTIF
    {
        $this->dom_attributes['fuseTimeout'] = $timeout;
        return $this;
    }
}