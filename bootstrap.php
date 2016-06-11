<?php 
define("AFRAME_ROOT", dirname(__FILE__));
/* Paths */
define("AFRAME_TMP", AFRAME_ROOT.DIRECTORY_SEPARATOR.'tmp');

function aframe_autoloder($class = false)
{
    $library = preg_replace(array(
        '/Aframe/',
        '/\\\\/'
    ), array(
        '',
        DIRECTORY_SEPARATOR
    ), $class);

    $class_file = AFRAME_ROOT . $library . '.php';
    if (file_exists($class_file))
        require_once ($class_file);
}
spl_autoload_register('aframe_autoloder');
