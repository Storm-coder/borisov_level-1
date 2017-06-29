<?php
error_reporting(0); // отключить вывод всех ошибок (эту команду можно писать только после того, как в файле menu.inc.php и bottom.inc.php была обработана ошибка)

require_once "inc/lib.inc.php"; // подключить файл lib.inc.php
set_error_handler("myError"); // говорим php: не надо использовать свой обработчик, используй мой обработчик (функция myError, которая в файле lib.inc.php) --- эту команду нужно писать после команды error_reporting(0);
require_once "inc/data.inc.php";

// Инициализация заголовков страници
$title = 'Сайт нашей школы';
$header = "$welcome, Гость";
$id = strtolower(cleanStr($_GET['id']));
	// принять параметры id, которые передаются с файла data.inc.php, функция $leftMenu (преобразовать значение переменной id в нижний регистр; удалить из этих значений html-теги и пробелы (по соображениям безорпасности - html-теги не безопасны))
//strtolower — Преобразует строку в нижний регистр
//strip_tags — Удаляет HTML и PHP-теги из строки
//trim() — Удаляет пробелы (или другие символы) из начала и конца строки
switch ($id) {
	case 'about':	// если переменная $id равна значению about
		$title = 'О сайте'; // присвоить переменным $title и $header соответствующие значения
		$header = 'О нашем сайте';
		break; // if true
	case 'contact':
		$title = 'Контакты';
		$header = 'Обратная связь';
		break;
	case 'table':
		$title = 'Таблица умножения';
		$header = 'Таблица умножения';
		break;
	case 'calc':
		$title = 'Он-лайн калькулятор';
		$header = 'Калькулятор';
		break;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
	<head>
		<title><?=$title?></title> <!--вывести на экран значение переменной в зависимости от контекста (index, contact...) страници-->
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>

		<div id="header">
			<!-- Верхняя часть страницы -->
				<!--код html перенесен в top.inc.php-->
			<?require_once "inc/top.inc.php"; // подключить файл?>
			<!-- Верхняя часть страницы -->
		</div>

		<div id="content">
			<!-- Заголовок -->
			<h1><?=$header?></h1>
			 <!-- (в $header приходит значение в зависимости от контекста (index, contact...) страници) -->
			<!-- Заголовок -->
			<blockquote>
				<?
					echo "Сегодня {$day}-{$mon}-{$year}";
				?>
			</blockquote>
			<!-- Область основного контента -->
				<!--код html перенесен в index.inc.php-->
				<?php

				switch ($id) {
					case 'about': include 'about.php'; break; // если переменная $id со значением about - подключить (включить) файл 'about.php'
					case 'contact': include 'contact.php'; break;
					case 'table': include 'table.php'; break;
					case 'calc': include 'calc.php'; break;
					default: include 'inc/index.inc.php'; // если в переменную $id не прилетает ни одно из предложеных (case) значений
				}

				?>
			<!-- / Область основного контента -->
		</div>
		<div id="nav">
			<!-- Навигация -->
				<!--код html перенесен в menu.inc.php-->
				<?require_once "inc/menu.inc.php"; // подключить файл?>
			<!-- Навигация -->
		</div>
		<div id="footer">
			<!-- Нижняя часть страницы -->
				<!--код html перенесен в bottom.inc.php-->
				<?require_once "inc/bottom.inc.php"; // подключить файл?>
			<!-- Нижняя часть страницы -->
		</div>
	</body>
</html>