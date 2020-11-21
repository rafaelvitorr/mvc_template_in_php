<?php
session_start();
require 'config.php';

// require 'controller/homeController.php'
spl_autoload_register(function($class){

    if(file_exists('controllers/'.$class.".php")){
        require 'controllers/'.$class.".php";
    }else if(file_exists('models/'.$class.'.php')){
        require 'models/'.$class.'.php';
    }else if(file_exists('core/'.$class.'.php')){
        require 'core/'.$class.'.php';
    }else if(file_exists('handlers/'.$class.'.php')){
        require 'handlers/'.$class.'.php';
    }
});

$core = new Core();
$core ->run();
