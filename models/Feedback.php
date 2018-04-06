<?php

/**
 * Класс Feedback - для получения и вывода сообщений обратной связи
 */
class Feedback
{

    /**
     * Запись принятых сообщений обратной связи в БД
     */
    public static function getFeedback($userId, $name, $email, $message){
        
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
    

}
