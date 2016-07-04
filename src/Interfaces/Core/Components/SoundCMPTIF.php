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
     * @return void
     */
    public function autoplay(bool $autoplay = false);

    /**
     * Play event
     *
     * An event for the entity to listen to before playing sound.
     *
     * @param string $event            
     * @return void
     */
    public function on(string $event = 'click');

    /**
     * Loop sound
     *
     * Whether to loop the sound once the sound finishes playing.
     *
     * @param bool $loop            
     * @return void
     */
    public function loop(bool $loop = false);

    /**
     * Audio source
     *
     * Path to sound file.
     *
     * @param string $src            
     * @return void
     */
    public function src(string $src = null);

    /**
     * Volume
     *
     * How loud to play the sound.
     *
     * @param float $vol            
     * @return void
     */
    public function volume(float $vol = 1);
}