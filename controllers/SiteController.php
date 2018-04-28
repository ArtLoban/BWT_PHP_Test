<?php 

/**
 * Контроллер SiteController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex(){
        
        $oneDaySec = 87000; // 60s*60m*24h +10 min
        
        // Время внесения записи в БД
        $date = WeatherParser::checkUpdatedDate();
        
        $sum = $date + $oneDaySec;
        
        // Обновление данных раз в сутки в 00-10
        if ($sum < time()){
            WeatherParser::updateWeather();
        }
        
        $weather = WeatherParser::getDataFromDB();
        
        
        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }


}
