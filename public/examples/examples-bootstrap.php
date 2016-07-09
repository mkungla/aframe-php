<?php
/* Require autoloader */
require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

/* DEV: Save output for testsuites */
function save_output_files($aframe, $path)
{
    $dir = dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . 'examples' . str_replace('/', DIRECTORY_SEPARATOR, $path);
    if(!is_dir($dir)) {
        mkdir($dir, 0700, true);
    }
    /* Update index HTML for documentation pages */
    $aframe->scene()->save(false, $dir . DIRECTORY_SEPARATOR . 'index.html');
    $aframe->scene()->save(true, $dir . DIRECTORY_SEPARATOR . 'scene.html');
}
/* Initialize A-FRAME */
$aframe = new AframeVR\Aframe();

/* Examples specific configuration */
$aframe->config()->set('format_output', true);
$aframe->config()->set('use_cdn', true);
$aframe->config()->set('cdn_url', '/aframe/aframe.min.js');