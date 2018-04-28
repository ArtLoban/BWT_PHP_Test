<?php 

use GuzzleHttp\Client;

/**
 * Класс WeatherParser - для парсинга погоды
 */
class WeatherParser
{

    /**
     * Метод для получения данных погоды с помощью библиотеки Guzzle
     */
    private static function getWeatherFromGismeteo()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://www.gismeteo.ua/city/daily/5093/', [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36'
                    . ' (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
                'Referer' => 'http://www.google.com'
                ]
            ]);
        
        $result = $response->getBody();
        return $result;
    }

    
    /**
     * Метод для обработки полученной html структуры с помощью библиотеки phpQuery
     * @return array <p>Массив с информацией о погоде</p>
     */
    private static function parseData(){
                
        $data = phpQuery::newDocument(WeatherParser::getWeatherFromGismeteo());
        
        $weatherArray =[];      // Массив для отпарсенных данных
        
        // Парсинг и внесение в массив общих данных о погоде на этот день 
        foreach ($data->find('.swtab') as $general){
            // Обвертка DOMElement в объект phpQUery
            $general = pq($general);
            
            $weatherArray['general'][] = $general->find('dt')->text();
            $weatherArray['general'][] = $general->find('img')->attr('src');
            $weatherArray['general'][] = $general->find('.temp span:first')->text();
            $weatherArray['general'][] = $general->find('em .c')->text();
        }  
        
        $p = 0; // Счетчик 'A part of day'
        
        // Парсинг и внесение в массив данных о погоде на каждую из 4х частей дня
        foreach ($data->find('#tbwdaily1 .wrow') as $dayParts){
            $dayParts = pq($dayParts);
            
            $weatherArray['dayParts'][$p][] = $dayParts->find('img')->attr('src');
            $weatherArray['dayParts'][$p][] = $dayParts->find('.cltext')->text();
            $weatherArray['dayParts'][$p][] = $dayParts->find('.temp span:first')->text();
            $weatherArray['dayParts'][$p][] = $dayParts->find('.torr')->text();
            $weatherArray['dayParts'][$p][] = $dayParts->find('.wicon')->text();
            $weatherArray['dayParts'][$p][] = $dayParts->find('.ms')->text();
            $weatherArray['dayParts'][$p][] = $dayParts->find('td:eq(5)')->text();
            $weatherArray['dayParts'][$p][] = $dayParts->find('td:last .value.m_temp.c')->text();
            $p++;
        }
        
        // Выгрузка из памяти
        phpQuery::unloadDocuments($data);
       
        return $weatherArray;
    }
    
    /**
     * Метод для сохранений данных погоды в БД
     */
    public static function saveWeather(){
        
        // Соединение с БД
        $db = Db::getConnection();
        
        $wArr = WeatherParser::parseData();
        
        // Текст запроса к БД для внесения данных в первую таблицу
        $sql1 = 'INSERT INTO general_w_data (day, img, mintemp, maxtemp)'
                . ' VALUES (:day, :img, :mintemp, :maxtemp)';
           
        $result1 = $db->prepare($sql1);
        $result1->bindParam(':day', $wArr['general'][0], PDO::PARAM_STR);
        $result1->bindParam(':img', $wArr['general'][1], PDO::PARAM_STR);
        $result1->bindParam(':mintemp', $wArr['general'][2], PDO::PARAM_STR);
        $result1->bindParam(':maxtemp', $wArr['general'][3], PDO::PARAM_STR);
        $result1->execute();
        
        // Текст запроса к БД для внесения данных во вторую таблицу
        $sql2 = 'INSERT INTO dpart_w_data (img, img_text, temp, pressure, wind_text, wind_value, air, tempf)'
                . ' VALUES (:img, :img_text, :temp, :pressure, :wind_text, :wind_value, :air, :tempf)';
        
        $p = 0;
        foreach ($wArr['dayParts'] as $arr[$p]) {
            
            $result2 = $db->prepare($sql2);
            $result2->bindParam(':img', $arr[$p][0], PDO::PARAM_STR);
            $result2->bindParam(':img_text', $arr[$p][1], PDO::PARAM_STR);
            $result2->bindParam(':temp', $arr[$p][2], PDO::PARAM_STR);
            $result2->bindParam(':pressure', $arr[$p][3], PDO::PARAM_INT);
            $result2->bindParam(':wind_text', $arr[$p][4], PDO::PARAM_STR);
            $result2->bindParam(':wind_value', $arr[$p][5], PDO::PARAM_INT);
            $result2->bindParam(':air', $arr[$p][6], PDO::PARAM_INT);
            $result2->bindParam(':tempf', $arr[$p][7], PDO::PARAM_STR);
            $result2->execute();
            $p++;
        }
        
    }
    
    /**
     * Метод для обновления данных погоды в БД
     */
    public static function updateWeather(){
        
        $db = Db::getConnection();
        $wArr = WeatherParser::parseData();
        
        // Текст запроса к БД для обновления данных в первой таблице
        $sql1 = 'UPDATE general_w_data
                    SET
                        day = :day,
                        img = :img,
                        mintemp = :mintemp,
                        maxtemp = :maxtemp
                    WHERE id = 1';
        
        $result1 = $db->prepare($sql1);
        $result1->bindParam(':day', $wArr['general'][0], PDO::PARAM_STR);
        $result1->bindParam(':img', $wArr['general'][1], PDO::PARAM_STR);
        $result1->bindParam(':mintemp', $wArr['general'][2], PDO::PARAM_STR);
        $result1->bindParam(':maxtemp', $wArr['general'][3], PDO::PARAM_STR);
        $result1->execute();
        
        // Текст запроса к БД для обновления данных во второй таблице
        $sql2 = 'UPDATE dpart_w_data
                    SET
                        img = :img,
                        img_text = :img_text,
                        temp = :temp,
                        pressure = :pressure,
                        wind_text = :wind_text,
                        wind_value = :wind_value,
                        air = :air,
                        tempf = :tempf
                    WHERE id = :id + 1'; // +1 для соответствия индекса массива id записи в таблице
        
        $id = 0;
        foreach ($wArr['dayParts'] as $arr[$id]) {
            
            $result2 = $db->prepare($sql2);
            $result2->bindParam(':id', $id, PDO::PARAM_INT);
            $result2->bindParam(':img', $arr[$id][0], PDO::PARAM_STR);
            $result2->bindParam(':img_text', $arr[$id][1], PDO::PARAM_STR);
            $result2->bindParam(':temp', $arr[$id][2], PDO::PARAM_STR);
            $result2->bindParam(':pressure', $arr[$id][3], PDO::PARAM_INT);
            $result2->bindParam(':wind_text', $arr[$id][4], PDO::PARAM_STR);
            $result2->bindParam(':wind_value', $arr[$id][5], PDO::PARAM_INT);
            $result2->bindParam(':air', $arr[$id][6], PDO::PARAM_INT);
            $result2->bindParam(':tempf', $arr[$id][7], PDO::PARAM_STR);
            $result2->execute();
            $id++;
        }
    }
    
    /**
     * Метод для получения данных погоды из БД
     * @return array
     */
    public static function getDataFromDB(){
        $db = Db::getConnection();
        
        $resultArr = array();
        
        $sql1 = 'SELECT `day`, `img`, `mintemp`, `maxtemp` FROM general_w_data';
        $general = $db->query($sql1)->fetch(PDO::FETCH_ASSOC);
        
        $resultArr['general'][] = $general['day'];
        $resultArr['general'][] = $general['img'];
        $resultArr['general'][] = $general['mintemp'];
        $resultArr['general'][] = $general['maxtemp'];
        
        $sql2 = 'SELECT * FROM dpart_w_data';
        $dpart = $db->query($sql2)->fetchAll(PDO::FETCH_NUM);
        
        $i = 0;
        // Внесение в массив данне о погоде на каждую из 4х частей дня
        foreach ($dpart as $arr){
            
            $resultArr['dayParts'][$i][] = $arr[1];
            $resultArr['dayParts'][$i][] = $arr[2];
            $resultArr['dayParts'][$i][] = $arr[3];
            $resultArr['dayParts'][$i][] = $arr[4];
            $resultArr['dayParts'][$i][] = $arr[5];
            $resultArr['dayParts'][$i][] = $arr[6];
            $resultArr['dayParts'][$i][] = $arr[7];
            $resultArr['dayParts'][$i][] = $arr[8];
            $resultArr['dayParts'][$i][] = $arr[9];
            $i++;
        }
        
        return $resultArr;
    }

    /**
     * Время последнего обновления данных
     * @return Unix timestamp
     */
    public static function checkUpdatedDate(){
        
        $db = Db::getConnection();
        $sql = 'SELECT DATE(date) as date  FROM general_w_data ORDER BY date DESC LIMIT 1';
        
        $date = $db->query($sql);
        $res = $date->fetch(PDO::FETCH_ASSOC);
        $res = strtotime($res['date']);
        return $res;
    }
}


        