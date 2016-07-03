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

$aframe->scene()->asset()->item('engine')
    ->src('models/engine.dae');

$aframe->scene()->asset()->mixin('image')
    ->geometry()
        ->height(2)
        ->width(2);

/* You can set Assets url as relative to scene url */
$aframe->scene()->asset()->audio('blip1')
    ->src('audio/321103__nsstudios__blip1.wav');

$aframe->scene()->asset()->audio('blip2')
    ->src('audio/321104__nsstudios__blip2.wav');
     
$aframe->scene()->asset()->img('glow1')
    ->src('img/glow1.png');

$aframe->scene()->asset()->img('ring1')
    ->src('img/ring1.png');
$aframe->scene()->asset()->img('ring2')
    ->src('img/ring2.png');
$aframe->scene()->asset()->img('ring3')
    ->src('img/ring3.png');
$aframe->scene()->asset()->img('ring4')
    ->src('img/ring4.png');
$aframe->scene()->asset()->img('ring5')
    ->src('img/ring5.png');

$aframe->scene()->asset()->img('schematic1')
    ->src('img/schematic1.png');
$aframe->scene()->asset()->img('schematic2')
    ->src('img/schematic2.png');
$aframe->scene()->asset()->img('schematic3')
    ->src('img/schematic3.png');
$aframe->scene()->asset()->img('schematic4')
    ->src('img/schematic4.png');
$aframe->scene()->asset()->img('schematic5')
    ->src('img/schematic5.png');
    
$aframe->scene()->asset()->img('text1')
    ->src('img/text1.png');
$aframe->scene()->asset()->img('text2')
    ->src('img/text2.png');
$aframe->scene()->asset()->img('text3')
    ->src('img/text3.png');
$aframe->scene()->asset()->img('text4')
    ->src('img/text4.png');

    
/* Render scene */
$aframe->scene()->render();

/* Update index HTML for documentation pages */
$aframe->scene()->save(false, dirname(__FILE__).DIRECTORY_SEPARATOR.'index.html');
$aframe->scene()->save(true, dirname(__FILE__).DIRECTORY_SEPARATOR.'scene.html');
