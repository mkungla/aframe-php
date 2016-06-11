# aframe-php

> Just a idea and test case repo to find out what would be the best way to structure the PHP API for creating [A-Frame](https://aframe.io/d) 3D and virtual reality scenes. This repo is nothing for production use at this point!

PHP API should be as light and independend as possible and have enough to generate basic scenes with dynamic content.

# Install and test

`composer require mkungla/aframe-php`

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
$aframe->scene()->cylinder('my-cyl-1')->position('-1.5 0.75 1');
$aframe->scene()->cylinder('my-cyl-1')->radius('0.5');
$aframe->scene()->cylinder('my-cyl-1')->height('1.5');
$aframe->scene()->cylinder('my-cyl-1')->color('#FF3267');

$aframe->scene()->cylinder('my-cyl-2')->position('0 0.75 1');
$aframe->scene()->cylinder('my-cyl-2')->radius('0.5');
$aframe->scene()->cylinder('my-cyl-2')->height('1.5');
$aframe->scene()->cylinder('my-cyl-2')->color('#4CC3D9');

$aframe->scene()->cylinder('my-cyl-3')->position('1.5 0.75 1');
$aframe->scene()->cylinder('my-cyl-3')->radius('0.5');
$aframe->scene()->cylinder('my-cyl-3')->height('1.5');
$aframe->scene()->cylinder('my-cyl-3')->color('#FFD463');

$aframe->scene()->plane('my-plane')->position('-2.5 2.2 1');
$aframe->scene()->plane('my-plane')->entity('no-composer')->text('text:Without composer, using own autoloader!; size:.2');
$aframe->scene()->plane('my-plane')->entity('no-composer')->material('color: #000');
/** Output rendered scene when and where you want or save it into file **/
$aframe->render();

````

# Github stats examples

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

