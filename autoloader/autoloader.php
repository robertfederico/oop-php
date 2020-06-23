<?php
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    if (file_exists("classes/" . $className . '.php')) {
        $path = "classes/";
    } else if (file_exists("../classes/" . $className . '.php')) {
        $path = "../classes/";
    } else {
        $path = "classes/";
    }

    include_once $path . $className . ".php";
}