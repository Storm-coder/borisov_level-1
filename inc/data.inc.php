<?php
/* Обработка ошибок (сообщение об ошибке) */
const ERR_ON_DRAW_MENU = "<h1 style = 'background: red'>Error! Функция отрисовки меню не отработала</h1>"; // ошибка для меню отрисовки. можно использовать и переменные, но лучше константы, их никто не перезапишет

  /* Menu */
$leftMenu = [
	['link'=>'Домой', 'href'=>'index.php'],
	['link'=>'О нас', 'href'=>'index.php?id=about'],
	['link'=>'Контакты', 'href'=>'index.php?id=contact'],
	['link'=>'Таблица умножения', 'href'=>'index.php?id=table'],
	['link'=>'Калькулятор', 'href'=>'index.php?id=calc'],
];
// link - ссылка; href - Задает адрес документа, на который следует перейти.
// id=about -- (переменная id со значением about) параметр, который передастся на index.php



/* Установка локали и даты */
setlocale(LC_ALL, "russian");  // получить имя месяца по-русски (LC_ALL, "russian" - все нижеперечисленное по-русски / кодировка будет 1251)
$day = strftime('%d'); // число
$mon = strftime('%B'); // месяц. возвращает в кодировке windows-1251 (а html здесь в UTF-8)
$mon = iconv('windows-1251', 'utf-8', $mon); // преобразовать из 1251 в UTF-8 (если код html в UTF-8) / переприсвоить переменной $mon значение в utf-8
$year = strftime('%Y');


/* Константа для футера */
const COPYRIGHT = "Супер Мега Веб-мастер"; // константа объявляется без знака доллара


/* Приветствие */
$hour = (int) strftime('%H'); // (int) - приводит строку в целое число
$welcome = '';

if ($hour > 0 && $hour < 6) {
$welcome = 'Доброй ночи';
}
elseif ($hour >= 6 && $hour < 12) {
    $welcome = 'Доброе утро';
}
elseif ($hour >= 12 && $hour < 18) {
    $welcome = 'Добрый день';
}
elseif ($hour >= 18 && $hour < 23) {
    $welcome = 'Добрый вечер';
}
else {
    $welcome = 'Доброй ночи';
}

?>