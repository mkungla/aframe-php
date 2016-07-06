<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 6, 2016 - 9:38:05 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         SoundComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Sound;

use \AframeVR\Interfaces\Core\Components\SoundCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class SoundComponent extends ComponentAbstract implements SoundCMPTIF
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
        $this->setDomAttribute('sound');
        return true;
    }

    /**
     * Autoplay sound
     *
     * Whether to automatically play sound once set.
     *
     * @param bool $autoplay            
     * @return SoundCMPTIF
     */
    public function autoplay(bool $autoplay = false): SoundCMPTIF
    {
        $this->dom_attributes['autoplay'] = $autoplay ? 'true' : 'false';
        return $this;
    }

    /**
     * Play event
     *
     * An event for the entity to listen to before playing sound.
     *
     * @param string $event            
     * @return SoundCMPTIF
     */
    public function on(string $event = 'click'): SoundCMPTIF
    {
        $this->dom_attributes['on'] = $event;
        return $this;
    }

    /**
     * Loop sound
     *
     * Whether to loop the sound once the sound finishes playing.
     *
     * @param bool $loop            
     * @return SoundCMPTIF
     */
    public function loop(bool $loop = false): SoundCMPTIF
    {
        $this->dom_attributes['loop'] = $loop ? 'true' : 'false';
        return $this;
    }

    /**
     * Audio source
     *
     * Path to sound file.
     *
     * @param null|string $src            
     * @return SoundCMPTIF
     */
    public function src(string $src = null): SoundCMPTIF
    {
        $this->dom_attributes['src'] = $src;
        return $this;
    }

    /**
     * Volume
     *
     * How loud to play the sound.
     *
     * @param int|float $vol            
     * @return SoundCMPTIF
     */
    public function volume(float $vol = 1): SoundCMPTIF
    {
        $this->dom_attributes['volume'] = $vol;
        return $this;
    }
}