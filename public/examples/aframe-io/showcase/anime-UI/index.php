<?php
/* Require autoloader */
require dirname(__DIR__, 5) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

/* Initialize A-FRAME */
$aframe = new AframeVR\Aframe();

/* Examples specific configuration */
$aframe->config()->set('format_output', true)
    ->set('use_cdn', true);

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Anime UI');
$aframe->scene()->description('Anime UI — A-Frame');

$aframe->scene()
    ->asset()
    ->item('engine')
    ->src('models/engine.dae');


/* Render scene */
$aframe->scene()->render();

/* Update index HTML for documentation pages */
$aframe->scene()->save(false, dirname(__FILE__).DIRECTORY_SEPARATOR.'index.html');
$aframe->scene()->save(true, dirname(__FILE__).DIRECTORY_SEPARATOR.'scene.html');
