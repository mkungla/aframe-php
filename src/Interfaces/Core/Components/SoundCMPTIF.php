<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 10:47:35 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         SoundCMPTIF.php
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
 * Sound Component Interface
 *
 * The sound component defines the entity as a source of sound or audio. The sound component is positional and is
 * therefore affected by the components-position.
 */
interface SoundCMPTIF extends ComponentInterface
{

    /**
     * Autoplay sound
     *
     * Whether to automatically play sound once set.
     *
     * @param bool $autoplay            
     * @return SoundCMPTIF
     */
    public function autoplay(bool $autoplay = false): SoundCMPTIF;

    /**
     * Play event
     *
     * An event for the entity to listen to before playing sound.
     *
     * @param string $event            
     * @return SoundCMPTIF
     */
    public function on(string $event = 'click'): SoundCMPTIF;

    /**
     * Loop sound
     *
     * Whether to loop the sound once the sound finishes playing.
     *
     * @param bool $loop            
     * @return SoundCMPTIF
     */
    public function loop(bool $loop = false): SoundCMPTIF;

    /**
     * Audio source
     *
     * Path to sound file.
     *
     * @param null|string $src            
     * @return SoundCMPTIF
     */
    public function src(string $src = null): SoundCMPTIF;

    /**
     * Volume
     *
     * How loud to play the sound.
     *
     * @param int|float $vol            
     * @return SoundCMPTIF
     */
    public function volume(float $vol = 1): SoundCMPTIF;
}