<?php
require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'bootstrap.php';
//require_once 'vendor/autoload.php';
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