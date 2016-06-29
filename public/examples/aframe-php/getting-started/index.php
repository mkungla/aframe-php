<?php
/* Require autoloader */
require dirname(__FILE__,4).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

/* Initialize A-FRAME */
$aframe = new AframeVR\Aframe();

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->meta()->title('Getting Started! • A-Frame PHP');
$aframe->scene()->meta()->description('Getting Started! • A-Frame PHP');

/* Render scene */
$aframe->scene()->render();
