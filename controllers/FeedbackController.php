<?php

/**
 * Контроллер FeedbackController
 */
class FeedbackController {

    /**
     * Action для обратной связи
     */
    public function actionPost() {
        // Переменные для формы
        $captcha = false;
        $name = false;
        $email = false;
        $message = false;
        $result = false;
        
        // Обработка данных из формы
        if (isset($_POST['submit'])) {

            // Если форма отправлена 
            // Получаю данные из формы
            $captcha = $_POST["captcha"];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            // id пользователя
            $userId = $_SESSION['user'];

            // Флаг ошибок
            $errors = false;
            
            // Проверка капчи
            if ($captcha != $_SESSION["rand_code"]){
                $errors[] = 'Капча введена неправильно';
            }
            
            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if ($message == '') {
                $errors[] = 'Поле сообщения не может быть пустым';
            }

            if ($errors == false) {
                // Если ошибок нет
                //Вношу данные обратной связи в БД
                $result = Feedback::createFeedback($userId, $name, $email, $message);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/feedback.php');
        return true;
    }

    /**
     * Получение нужного отображения даты
     */
    private function getDate($dateStamp){
        $timestamp = strtotime($dateStamp);
        $date = date('d.m.Y', $timestamp). ' в ' . date('G:i', $timestamp);
        return $date;
    }

    /**
     * Action для вывода списка оставленых фидбеков
     */
    public function actionList($page = 1) {
       
        $feedbacksList = Feedback::getFeedbacksList($page);
        
        // Кол-во фидбеков на странице
        $count = count($feedbacksList);
        
        // Общее количетсво фидбеков (необходимо для постраничной навигации)
        $total = Feedback::getFeedbacksCount();
        
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Feedback::SHOW_BY_DEFAULT, 'page-');
        
        
        // Подключаем вид
        require_once(ROOT . '/views/site/feedback-list.php');
        return true;
    }
}
