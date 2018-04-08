<?php

return array(
    
    // Обратная связь
    'feedback/post' => 'feedback/post',
    'feedback/list/page-([0-9]+)' => 'feedback/list/$1',
    
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    
    // Главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
);
