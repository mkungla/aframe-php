<?php
/* Common bootstrap for examples */
include dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Tracked Controls');
$aframe->scene()->description('Tracked Controls — A-Frame');

$aframe->scene()->addScript('components/aabb-collider.js');
$aframe->scene()->addScript('components/grab.js');
$aframe->scene()->addScript('components/ground.js');

$aframe->scene()->addScript('shaders/skyGradient.js');

$aframe->scene()->asset()->mixin('cube')
    ->geometry('primitive: box; height: 0.30; width: 0.30; depth: 0.30')
    ->color('#EF2D5E');

$aframe->scene()->asset()->mixin('cube-collided')
    ->color('#F2E646');

$aframe->scene()->asset()->mixin('cube-grabbed')
    ->color('#F2E646');

$aframe->scene()->fog()
    ->color('#bc483e')
    ->near(0)
    ->far(65);
/* Hands */
$aframe->scene()->entity(1)
    ->attr('hand-controls', 'left')
    ->attr('aabb-collider', 'objects: .cube;')
    ->attr('grab', true);
$aframe->scene()->entity(2)
    ->attr('hand-controls', 'right')
    ->attr('aabb-collider', 'objects: .cube;')
    ->attr('grab', true);
/* A-Frame cubes */
$aframe->scene()->entity(3)
    ->class('cube')
    ->mixin('cube')
    ->position(0.30, 1.65, 0);
$aframe->scene()->entity(4)
    ->class('cube')
    ->mixin('cube')
    ->position(0, 1.95, 0);
$aframe->scene()->entity(5)
    ->class('cube')
    ->mixin('cube')
    ->position(-0.30, 1.65, 0);

$aframe->scene()->entity(6)
    ->class('cube')
    ->mixin('cube')
    ->position(0.60, 1.35, 0);
$aframe->scene()->entity(7)
    ->class('cube')
    ->mixin('cube')
    ->position(0.60, 1.05, 0);
$aframe->scene()->entity(8)
    ->class('cube')
    ->mixin('cube')
    ->position(0.60, 0.75, 0);
$aframe->scene()->entity(9)
    ->class('cube')
    ->mixin('cube')
    ->position(0.60, 0.45, 0);
$aframe->scene()->entity(10)
    ->class('cube')
    ->mixin('cube')
    ->position(0.60, 0.15, 0);


$aframe->scene()->entity(11)
    ->class('cube')
    ->mixin('cube')
    ->position(0.30, 0.75, 0);
$aframe->scene()->entity(12)
    ->class('cube')
    ->mixin('cube')
    ->position(0, 0.75, 0);
$aframe->scene()->entity(13)
    ->class('cube')
    ->mixin('cube')
    ->position(-0.30, 0.75, 0);

$aframe->scene()->entity(14)
    ->class('cube')
    ->mixin('cube')
    ->position(-0.60, 1.35, 0);
$aframe->scene()->entity(15)
    ->class('cube')
    ->mixin('cube')
    ->position(-0.60, 1.05, 0);
$aframe->scene()->entity(16)
    ->class('cube')
    ->mixin('cube')
    ->position(-0.60, 0.75, 0);
$aframe->scene()->entity(17)
    ->class('cube')
    ->mixin('cube')
    ->position(-0.60, 0.45, 0);
$aframe->scene()->entity(18)
    ->class('cube')
    ->mixin('cube')
    ->position(-0.60, 0.15, 0);

/* Environment */
$aframe->scene()->entity('sky')
    ->attr('geometry', 'primitive: sphere; radius: 65;')
    ->attr('material', 'shader: skyGradient; colorTop: #353449; colorBottom: #BC483E; side: back');
$aframe->scene()->entity(19)
    ->attr('ground',true);

$aframe->scene()->light(1)
    ->type('point')
    ->color('#f4f4f4')
    ->intensity(.2)
    ->distance(0)
    ->position(8, 10, 18);
$aframe->scene()->light(2)
    ->type('point')
    ->color('#f4f4f4')
    ->intensity(.6)
    ->distance(0)
    ->position(-8, 10, -18);
$aframe->scene()->light(2)
    ->type('ambient')
    ->color('#f4f4f4')
    ->intensity(.4)
    ->distance(0)
    ->position(-8, 10, -18);


/* Render scene */
$aframe->scene()->render();