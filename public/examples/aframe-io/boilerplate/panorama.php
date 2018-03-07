<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Panorama • A-Frame');
$aframe->scene()->description('Panorama • A-Frame');

$aframe->scene()->asset()->img('panorama')
    ->src('img/panorama/puydesancy.jpg');

$aframe->scene()->sky()
    ->src('#panorama')
    ->rotation(0, -130, 0);

/* Render scene */
$aframe->scene()->render();