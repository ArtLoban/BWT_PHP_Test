<?php

/**
 * Контроллер SiteController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Weather info
        $weatherInfo = WeatherParser::getWeather();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }


}
