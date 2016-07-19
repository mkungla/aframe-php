<?php
/* Common bootstrap for examples */
include dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Dynamic Lights');
$aframe->scene()->description('Dynamic Lights — A-Frame');

$aframe->scene()->asset()->mixin('light')
    ->geometry('primitive: sphere; radius: 1.5')
    ->material('color: #FFF; shader: flat')
    ->light('color: #DDDDFF; distance: 120; intensity: 2; type: point');

$aframe->scene()->asset()->mixin('torus-knot')
    ->geometry('primitive: torusKnot')
    ->material('color: red');

$aframe->scene()->camera()
    ->fov(45)
    ->active(true)
    ->position(0, 0, 80);

$aframe->scene()->sky()
    ->radius(300)
    ->shader('flat')
    ->color('#111')
    ->scale(-1, -1, -1);

$aframe->scene()->entity(1)->position(0, 0, 0)
    ->animation()
        ->attribute('rotation')
        ->to('0 0 360')
        ->repeat('indefinite')
        ->easing('linear')
        ->dur(4096);
$aframe->scene()->entity(1)
    ->child()->entity()
        ->mixin('light')
        ->position(30, 0, 0);

$aframe->scene()->entity(2)->position(0, 0, 0)
    ->animation()
        ->attribute('rotation')
        ->to('360 0 0')
        ->repeat('indefinite')
        ->easing('linear')
        ->dur(4096);
$aframe->scene()->entity(2)
    ->child()->entity()
        ->mixin('light')
        ->position(0, 0, 40);



function getRandColor () {

    $letters  = 'ABCDEF0123456789';
    $color = '#';
    for ($i = 1; $i <= 6; $i++) {
        $pos    = rand(0, strlen($letters) - 1);
        $color .= $letters[$pos];
    }
    return $color;
}
function getRandFloat()
{
    return (float)rand()/(float)getrandmax();
}
function getRandCoord() {
    $coord = getRandFloat() * 60;
    return (float)rand()/(float)getrandmax() < .5 ? $coord + 5 : $coord * -1 - 5;
}

for ($i = 3; $i < 123; $i++) {
    $aframe->scene()->entity($i)
        ->color(getRandColor())
        ->metalness(getRandFloat())
        ->roughness(getRandFloat())
        ->position(getRandCoord(), getRandCoord(), getRandCoord())
        ->geometry()
        ->primitive('torusKnot')
        ->radius(getRandFloat() * 10)
        ->radiusTubular(getRandFloat() * .75)
        ->p(round(getRandFloat() * 10))
        ->q(round(getRandFloat() * 10));
}

/* Render scene */
$aframe->scene()->render();
