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
                $result = Feedback::getFeedback($userId, $name, $email, $message);
            }
        }


        // Подключаем вид
        require_once(ROOT . '/views/site/feedback.php');
        return true;
    }

}
