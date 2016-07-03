<?php 
/* Require autoloader */
require dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

/* Initialize A-FRAME */
$aframe = new AframeVR\Aframe();

/* Examples specific configuration */
$aframe->config()->set('format_output', true)
    ->set('use_cdn', true);

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Hello, World! • A-Frame');
$aframe->scene()->description('Hello, World! • A-Frame');

/* sphere method creates anonymous entity matching primitive sphere */
$aframe->scene()->sphere()
    ->position(0, 1.25, -1)
    ->radius(1.25)
    ->color('#EF2D5E');

/* box method creates anonymous entity matching primitive box */
$aframe->scene()->box()
    ->position(-1, 0.5, 1)
    ->rotation(0, 45, 0)
    ->width(1)
    ->height(1)
    ->depth(1)
    ->color('#4CC3D9');

/* cylinder method creates anonymous entity matching primitive cylinder */
$aframe->scene()->cylinder()
    ->position(1, 0.75, 1)
    ->radius(0.5)
    ->height(1.5)
    ->color('#FFC65D');

/* plane method creates anonymous entity matching primitive plane */
$aframe->scene()->plane()
    ->rotation(-90, 0, 0)
    ->width(4)
    ->height(4)
    ->color('#7BC8A4');

/* sky method creates anonymous entity matching primitive sky */
$aframe->scene()->sky()
    ->color('#000');

/* Render scene */
$aframe->scene()->render();

/* Update index HTML for documentation pages */
$aframe->scene()->save(false, dirname(__FILE__).DIRECTORY_SEPARATOR.'index.html');
$aframe->scene()->save(true, dirname(__FILE__).DIRECTORY_SEPARATOR.'scene.html');
