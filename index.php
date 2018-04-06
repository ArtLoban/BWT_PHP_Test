<?php

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');


// Допуск на сайт только авторизованных пользователей

if (isset($_SESSION['user'])
    || $_SERVER["REQUEST_URI"] == '/user/login'
    || $_SERVER["REQUEST_URI"] == '/user/register'){
    
    // Вызов Router
    $router = new Router();
    $router->run();
    
}else{
    header("Location: /user/login");
}
  