<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Primitives! • A-Frame PHP');
$aframe->scene()->description('Primitives! • A-Frame PHP');
$aframe->scene()->stats();

$aframe->scene()->asset()->mixin('aframe-color')
    ->material()->color('rgb(239,45,94)');

$aframe->scene()->box()
    ->position(-1, 0.5, 1)
    ->rotation(0, 45, 0)
    ->width(1)
    ->height(1)
    ->depth(1)
    ->mixin('aframe-color');

$aframe->scene()->circle()
    ->position(-3, 0, -.5)
    ->mixin('aframe-color');

$aframe->scene()->cone()
    ->position(3.2, 0, -.5)
    ->mixin('aframe-color');

$aframe->scene()->sphere()
    ->position(0, 1.25, -1)
    ->radius(1.25)
    ->mixin('aframe-color');

$aframe->scene()->cylinder()
    ->position(1, 0.75, 1)
    ->radius(0.5)
    ->height(1.5)
    ->mixin('aframe-color');

$aframe->scene()->plane()
    ->rotation(-90, 0, 0)
    ->width(4)
    ->height(4)
    ->mixin('aframe-color');

$aframe->scene()->ring()
    ->position(3.2, 2, -.5)
    ->mixin('aframe-color');

$aframe->scene()->torus()
    ->position(-3, 2, -.5)
    ->mixin('aframe-color');

    
/* Render scene */
$aframe->scene()->render();
