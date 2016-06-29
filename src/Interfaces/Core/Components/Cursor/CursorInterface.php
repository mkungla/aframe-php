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
 * File         CursorInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components\Cursor;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Note, to further customize the cursor component, we can set the properties of the raycaster component.
 */
interface CursorInterface extends ComponentInterface
{

    /**
     * Whether cursor is fuse-based.
     *
     * false on desktop, true on mobile
     *
     * @param bool $fuse            
     */
    public function fuse(bool $fuse = false);

    /**
     * fuseTimeout
     *
     * How long to wait (in milliseconds) before triggering a fuse-based click event.
     *
     * @param int $timeout            
     */
    public function fuseTimeout(int $timeout = 1500);
}
