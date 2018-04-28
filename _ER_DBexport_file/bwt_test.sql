-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2018 г., 14:08
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bwt_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dpart_w_data`
--

CREATE TABLE `dpart_w_data` (
  `id` int(11) NOT NULL,
  `day_part` varchar(6) DEFAULT NULL,
  `img` varchar(64) DEFAULT NULL,
  `img_text` varchar(32) DEFAULT NULL,
  `temp` varchar(4) DEFAULT NULL,
  `pressure` smallint(4) DEFAULT NULL,
  `wind_text` varchar(3) DEFAULT NULL,
  `wind_value` tinyint(3) DEFAULT NULL,
  `air` tinyint(3) DEFAULT NULL,
  `tempf` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dpart_w_data`
--

INSERT INTO `dpart_w_data` (`id`, `day_part`, `img`, `img_text`, `temp`, `pressure`, `wind_text`, `wind_value`, `air`, `tempf`) VALUES
(1, 'Ночь', '//s2.gismeteo.ua/static/images/icons/new/n.moon.png', 'Ясно', '+14', 749, 'ЮВ', 2, 85, '+14'),
(2, 'Утро', '//s1.gismeteo.ua/static/images/icons/new/d.sun.png', 'Ясно', '+19', 749, 'ЮЗ', 5, 61, '+19'),
(3, 'День', '//s1.gismeteo.ua/static/images/icons/new/d.sun.c3.png', 'Облачно', '+25', 748, 'ЮЗ', 5, 44, '+22'),
(4, 'Вечер', '//s2.gismeteo.ua/static/images/icons/new/n.moon.c2.r2.png', 'Малооблачно, дождь', '+13', 752, 'СЗ', 6, 89, '+13');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `message` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `name`, `email`, `message`, `date`) VALUES
(1, 1, 'Вася', 'petrov@mail.ua', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', '2018-04-06 19:19:38'),
(2, 1, 'Василий', 'petrov@mail.ua', 'По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.', '2018-04-06 19:20:12'),
(3, 2, 'Джон', 'smith@gmail.com', 'Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же рамки и место обучения кадров способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач.\r\n\r\nРазнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа модели развития. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание дальнейших направлений развития. С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании существенных финансовых и административных условий.', '2018-04-06 19:22:34'),
(4, 2, 'John', 'smith@gmail.com', 'Where can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2018-04-06 19:23:37'),
(5, 3, 'Юля', 'lorem@mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nUt enim ad minim veniam, quis', '2018-04-06 19:25:29'),
(6, 3, 'Юлия', 'lorem@mail.ru', 'Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '2018-04-06 19:26:12'),
(7, 1, 'Vasiliy', 'vasiliy@mail.gl', 'Идейные соображения высшего порядка, а также укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании систем массового участия. С другой стороны дальнейшее развитие различных форм деятельности позволяет выполнять важные задания по разработке модели развития. Равным образом сложившаяся структура организации способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Равным образом реализация намеченных плановых заданий способствует подготовки и реализации систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании существенных финансовых и административных условий.\r\n\r\nС другой стороны постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. Задача организации, в особенности же начало повседневной работы по формированию позиции играет важную роль в формировании направлений прогрессивного развития. Задача организации, в особенности же укрепление и развитие структуры позволяет оценить значение системы обучения кадров, соответствует насущным потребностям. Повседневная практика показывает, что консультация с широким активом способствует подготовки и реализации систем массового участия.\r\n\r\nПовседневная практика показывает, что консультация с широким активом требуют определения и уточнения модели развития. Таким образом сложившаяся структура организации требуют определения и уточнения соответствующий условий активизации.', '2018-04-06 19:27:53'),
(8, 4, 'Name', 'a@a.a', 'THe new message', '2018-04-06 22:34:17'),
(9, 4, 'New Name', 'asdsa@as.aa', 'Some text here\r\nAnd here some text', '2018-04-06 22:37:56'),
(10, 4, 'Alex', 'alex@gamil.com', 'English National Ballet\r\n   Despite a tortuous history punctuated by the potentially catastrophic financial crises typical of postwar policy for the arts generally and for dance in particular in the UK, the English National Ballet survives to delight audiences at London’s Royal Festival Hall, usually during the early weeks of the year, before going on to tour the provinces. The company is associated above all with spectacular, even glamorous productions of full-length ballets performed in quite traditional styles. Though sometimes criticized for not generally being in the forefront of innovation, the ENB deserves credit for maintaining in repertory such romantic classics as The Nutcracker and Cinderella, thus attracting and satisfying a large if somewhat conventional public. It further contributes to dance in Britain by running a ballet school.\r\n   In 1950, anticipating the Festival of Britain by a year, the Festival Ballet emerged from the touring company headed by Anton Dolin (or, to give the Sussex-born dancer his English name, Sydney Healey-Kay) and Alicia Markova (Lillian Marks), who had both starred in Diaghilev’s Ballets Russes and had teamed up on previous occasions. ', '2018-04-08 18:21:07'),
(11, 4, 'Юрий', 'ura@mail.ru', 'Величайшая история любви всех времен и народов. История, не сходившая со сценических подмостков, экранизированная бессчетное количество раз — и до сих пор не утратившая беспредельного обаяния страсти — страсти губительной, разрушительной, слепой — но тем более завораживающей своим величием.', '2018-04-08 18:38:29'),
(12, 4, 'Никита', 'nikita@umail.ua', '\"Призрак оперы действительно существовал\" - доказательству этого тезиса посвящен один из самых нашумевших французских романов рубежа XIX-XX веков. Он принадлежит перу Гастона Леру, мэтра полицейского романа, автора знаменитой \"Тайны Желтой комнаты\", \"Духов дамы в черном\". Но по жанру \"Призрак Оперы\" ближе к традициям готического романа, к \"Парижским тайнам\" Эжена Сю. С первой и до последней страницы Леру держит читателя в напряжении. Возможно, именно здесь кроется одна из причин того, что этот сюжет в XX веке не раз получал новое воплощение, достаточно вспомнить одноименный фильм, а также мюзикл Эндрю Ллойда Вебера. \r\nПодробнее на livelib.ru:\r\nhttps://www.livelib.ru/pubseries/18770-mirovaya-klassika', '2018-04-08 18:39:21'),
(13, 4, 'MyName', 'myemail@here.ua', 'A bit of text here.\r\nAnd a little piece of text here', '2018-04-08 18:41:06'),
(14, 4, 'Victoria', 'someadress@mail.ua', 'In 1950, anticipating the Festival of Britain by a year, the Festival Ballet emerged from the touring company headed by Anton Dolin (or, to give the Sussex-born dancer his English name, Sydney Healey-Kay) and Alicia Markova (Lillian Marks), who had both starred in Diaghilev’s Ballets Russes and had teamed up on previous occasions. Markova left after two years and was replaced by Belinda Wright, but Dolin remained artistic director until handing over to John Gilpin in 1962. For the first fifteen years of its existence the manager was Dr Julian Braunsweg, an irrepressibly enterprising impresario. His policy was to provide, not only in the capital but also in provincial centres and even occasionally abroad, fine productions of popular ballets with international stars at affordable prices. That ought to have been a winning formula, especially as it combined the pursuit of excellence in its performances with an anti-elitist attitude towards its audiences. But, despite good houses, tickets sales could not meet ever-rising expenses, and the Festival Ballet, which lacked a permanent base, had to compete for funding with other companies that were considered more adventurous in their programming. The consequence was repeated doubts about viability.\r\n   Whether successive names changes, first to the London Festival Ballet, then to the English National Ballet, have contributed to the maintenance of corporate identity and consistency of artistic policy is a moot point as well. Despite its difficulties the ENB has struggled through. Under Peter Schaufuss, it strengthened its position as a company specializing in the classics and contributing a vital strand to contemporary British dance theatre.', '2018-04-08 18:42:15'),
(15, 4, 'John Smith', 'smith@gmail.com', 'National Ballet Academy and Trust of India — The National Ballet Academy and Trust of India was established in 2002 to promote Classical Ballet in India and is the Principal Indian Ballet Academy in India recognized abroad. Training The medium of instruction is English and the training.', '2018-04-08 18:43:53');

-- --------------------------------------------------------

--
-- Структура таблицы `general_w_data`
--

CREATE TABLE `general_w_data` (
  `id` int(11) NOT NULL,
  `day` varchar(2) DEFAULT NULL,
  `img` varchar(64) DEFAULT NULL,
  `mintemp` varchar(4) DEFAULT NULL,
  `maxtemp` varchar(4) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `general_w_data`
--

INSERT INTO `general_w_data` (`id`, `day`, `img`, `mintemp`, `maxtemp`, `date`) VALUES
(1, 'ПТ', '//s1.gismeteo.ua/static/images/icons/new/d.sun.c3.r2.st.png', '+12', '+25', '2018-04-27 12:32:46');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT '',
  `password` varchar(32) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birthday` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `gender`, `birthday`) VALUES
(1, 'Василий', 'Петров', 'petrov@mail.ua', '96e79218965eb72c92a549dd5a330112', 'male', '1990-09-19'),
(2, 'John', 'Smith', 'smith@gmail.com', '96e79218965eb72c92a549dd5a330112', 'male', '1981-08-05'),
(3, 'Юлия', 'Lorem', 'lorem@mail.ru', '96e79218965eb72c92a549dd5a330112', 'female', '2001-07-04'),
(4, 'aa', 'aa', 'a@a.a', '96e79218965eb72c92a549dd5a330112', 'male', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dpart_w_data`
--
ALTER TABLE `dpart_w_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `general_w_data`
--
ALTER TABLE `general_w_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dpart_w_data`
--
ALTER TABLE `dpart_w_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `general_w_data`
--
ALTER TABLE `general_w_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
