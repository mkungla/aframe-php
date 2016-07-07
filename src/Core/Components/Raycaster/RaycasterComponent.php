<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 3:52:28 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         RaycasterComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Raycaster;

use \AframeVR\Interfaces\Core\Components\RaycasterCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class RaycasterComponent extends ComponentAbstract implements RaycasterCMPTIF
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
        $this->setDomAttribute('raycaster');
        return true;
    }

    /**
     * Maximum distance
     *
     * Maximum distance under which resulting entities are returned. Cannot be lower then near.
     *
     * @param string $distance            
     * @return RaycasterCMPTIF
     */
    public function far(string $distance = 'Infinity'): RaycasterCMPTIF
    {
        $this->dom_attributes['far'] = $distance;
        return $this;
    }

    /**
     * Number of milliseconds
     *
     * Number of milliseconds to wait in between each intersection test. Lower number is better for faster updates.
     * Higher number is better for performance.
     *
     * @param int $ms            
     * @return RaycasterCMPTIF
     */
    public function interval(int $ms = 100): RaycasterCMPTIF
    {
        $this->dom_attributes['interval'] = $ms;
        return $this;
    }

    /**
     * Minimum distance
     *
     * Minimum distance over which resuilting entities are returned. Cannot be lower than 0.
     *
     * @param int $distance            
     * @return RaycasterCMPTIF
     */
    public function near(int $distance = 0): RaycasterCMPTIF
    {
        $this->dom_attributes['near'] = $distance;
        return $this;
    }

    /**
     * Query selector
     *
     * Query selector to pick which objects to test for intersection. If not specified, all entities will be tested.
     *
     * @param null|string $selector            
     * @return RaycasterCMPTIF
     */
    public function objects(string $selector = null): RaycasterCMPTIF
    {
        $this->dom_attributes['objects'] = $selector;
        return $this;
    }

    /**
     * Recursive
     *
     * Checks all children of objects if set. Else only checks intersections with root objects.
     *
     * @param bool $r            
     * @return RaycasterCMPTIF
     */
    public function recursive(bool $r = true): RaycasterCMPTIF
    {
        $this->dom_attributes['recursive'] = $r ? 'true' : 'false';
        return $this;
    }
}
