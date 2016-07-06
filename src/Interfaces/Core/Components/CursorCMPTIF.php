<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 29, 2016 - 10:31:50 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CursorCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Cursor Component Interface
 *
 * The cursor component lets us interact with entities through clicking and gazing.
 * It is a specific application of the
 * raycaster component in that it:
 */
interface CursorCMPTIF extends ComponentInterface
{

    /**
     * Whether cursor is fuse-based.
     *
     * false on desktop, true on mobile
     *
     * @param bool $fuse            
     * @return CursorCMPTIF
     */
    public function fuse(bool $fuse = false): CursorCMPTIF;

    /**
     * fuseTimeout
     *
     * How long to wait (in milliseconds) before triggering a fuse-based click event.
     *
     * @param int $timeout            
     * @return CursorCMPTIF
     */
    public function fuseTimeout(int $timeout = 1500): CursorCMPTIF;
}