<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 10:29:24 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         RaycasterCMPTIF.php
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
 * Raycaster Component Interface
 *
 * The raycaster component does general intersection testing with a raycaster. Raycasting is the method of extending a
 * line from an origin towards a direction, and checking whether that line intersects with other entites. The raycaster
 * component is a wrapper on top of the three.js raycaster. It checks for intersections at a certain interval against a
 * list of objects, and will emit events on the entity when it detects intersections or clearing of intersections
 * (i.e., when the raycaster is no longer intersecting an entity).
 */
interface RaycasterCMPTIF extends ComponentInterface
{

    /**
     * Maximum distance
     *
     * Maximum distance under which resulting entities are returned. Cannot be lower then near.
     *
     * @param string $distance            
     * @return void
     */
    public function far(string $distance = 'Infinity');

    /**
     * Number of milliseconds
     *
     * Number of milliseconds to wait in between each intersection test. Lower number is better for faster updates.
     * Higher number is better for performance.
     *
     * @param int $ms            
     * @return void
     */
    public function interval(int $ms = 100);

    /**
     * Minimum distance
     *
     * Minimum distance over which resuilting entities are returned. Cannot be lower than 0.
     *
     * @param int $distance            
     * @return void
     */
    public function near(int $distance = 0);

    /**
     * Query selector
     *
     * Query selector to pick which objects to test for intersection. If not specified, all entities will be tested.
     *
     * @param string $selector            
     * @return void
     */
    public function objects(string $selector = null);

    /**
     * Recursive
     *
     * Checks all children of objects if set. Else only checks intersections with root objects.
     *
     * @param bool $r            
     * @return void
     */
    public function recursive(bool $r = true);
}