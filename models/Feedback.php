<?php

/**
 * Класс Feedback - для получения и вывода сообщений обратной связи
 */
class Feedback
{
    // Количество отображаемых фидбеков по умолчанию
    const SHOW_BY_DEFAULT = 7;
    
    /**
     * Запись принятых сообщений обратной связи в БД
     */
    public static function createFeedback($userId, $name, $email, $message){
        
        // Соединение с БД
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = 'INSERT INTO feedback (user_id, name, email, message)'
                . 'VALUES (:user_id, :name, :email, :message)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        return $result->execute();
    }
    
    /**
     * Получение списка всех федбеков из БД
     */
    public static function getFeedbacksList($page = 1){
        
        $limit = Feedback::SHOW_BY_DEFAULT;
        
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        // Соединение с БД
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = 'SELECT name, email, message, date FROM feedback '
                . 'ORDER BY date DESC LIMIT :limit OFFSET :offset';
        
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        
        // Выполнение коменды
        $result->execute();
           
        // Получение и возврат результатов
        $feedbacksList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $feedbacksList[$i]['name'] = $row['name'];
            $feedbacksList[$i]['email'] = $row['email'];
            $feedbacksList[$i]['message'] = $row['message'];
            $feedbacksList[$i]['date'] = $row['date'];
            $i++;
        }
        return $feedbacksList;
    }

    /**
     * Получение общего кол-ва федбеков
     */
    public static function getFeedbacksCount(){
        
        // Соединение с БД
        $db = Db::getConnection();
        
        // Получение и возврат результатов
        $result = $db->query('SELECT count(id) AS count FROM feedback');
        
        $row = $result->fetch();
                
        return $row['count'];
    }
    
}
