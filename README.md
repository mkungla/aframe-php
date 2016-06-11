# aframe-php

> Just a idea and test case repo to find out what would be the best way to structure the PHP API for creating A-Frame 3D and virtual reality scenes.

PHP API should be as light and independend as possible and have enough to generate basic scenes with dynamic content.

````php
<?php
require_once 'vendor/autoload.php';
/**
 * Esample
 *
 * @var \Aframe\VR $VR
 */
$aframe = new \Aframe\VR();

/**
 * Create the scene
 * Check examples directory
 * $aframe->scene()->...
 */

/** Output rendered scene when and where you want or save it into file **/
$aframe->render();
.......
````

# Examples

````php
<?php
// Examples use following configuration
$CFG = array();
/* Github */
$CFG['username'] = 'aframevr';
$CFG['repo'] = 'aframe';
$CFG['color']['plate-bg']       = '#ff2c61';
$CFG['color']['plate-fg']       = '#f3e830';
$CFG['color']['col']            = '#f3e830';
$CFG['color']['col-bottom']     = '#198d7f';
$CFG['color']['carpet']         = '#198d7f';
$CFG['color']['progress-base']  = '#04c9ff';
$CFG['color']['progress-bar']   = '#0f3a46';
$CFG['color']['floor']          = '#198d7f';
$CFG['color']['hemisphere']     = '#04c9ff';
````
