<!-- Библиотека (здесь описаны функции) -->

<?php
/* Собственный обработчик ошибок */
function myError($no, $msg, $file, $line) {
	$dt = date("d-m-Y H:i:s"); // дата
	$str = "[$dt] - $msg in $file:$line/n"; // сформировать строку (дата будет в квадратных скобках)

	switch ($no) { // условие по номеру (если это моя ошибка - E_USER_ERROR, WARNING, NOTICE вывести $msg). все ошибки прилетают сюда, в одно место, центральное
		case E_USER_ERROR:
		case E_USER_WARNING:
		case E_USER_NOTICE:
			echo $msg; // это сообщение отправляем пользователю
	// это выводим (на сайте вместо меню) в случае наших ошибок (php-шные ошибки здесь не показываем)
	}
	error_log($str, 3, "error.log"); // а это для вывода в файле error.log всех ошибок вообще (и наши и php)
}

/*Таблица умножения*/

function drawTable ($cols = 10, $rows = 10, $background = 'yellow') {
	echo "<table border = '1' width='500' text-align:'center'>";
	for ($tr = 1; $tr <= $rows; $tr++) { // минимальная таблица умножения - это 1 х 1
	    echo "<tr>"; // рисует строку (внутри <tr> находится <td> - нужен очередной цикл)
	        for ($td = 1; $td <= $cols; $td++) { 
	            if ($tr == 1 || $td == 1) {
	               echo "<th style = 'background : {$background}; text-align: center'>" . $tr * $td . "</th>"; // <th> - заголовочные ячейки
	            } else
	            echo "<td style='color:dark; text-align: center'>" . $tr * $td . "</td>"; // $tr * $td - для вывода значений (цифр) внутри таблицы
	        	}
	        }
	    echo "</tr>";
	echo "</table>";
	}

/* Этот участок кода "strip_tags(trim(...))" повторяется в 3-х файлах (index.php, table.php, calc.php): под него напишем функцию "cleanStr" */
function cleanStr ($data) {
	return strip_tags(trim($data));
}
    //trim() — Удаляет пробелы (или другие символы) из начала и конца строки
    // strip_tags() — Удаляет HTML и PHP-теги из строки 

/* Функция, возвращает целочисленное значение */
function cleanInt($data) { // $data - входящий строковый параметр (например, "$_POST['num2']")
	return (int)$data;
}

/* Функция, возвращает положительное число (abs(-5);   // => 5) */
function cleanUInt($data) {
	return abs(cleanInt($data)); 
}
// abs() - функция, возвращает положительное число (abs(-5);   // => 5)

/* Отрисовка меню с помощью функции */

function drawMenu ($menu, $vertical = true) { // в параметр $menu передается массив $leftMenu / $vertical = true --- Данный параметр указывает, каким образом будет отрисовано меню - вертикально или горизонтально
	
/* обработка ошибки */
	if (!is_array($menu)) { // если входящий параметр не массив
		return false; // возвращает false и выходит из функции
	} // а если все хорошо - в конце функции, когда уже все отрисовали пишем: return true;
/* / обработка ошибки */

	$style = "";
	if (!$vertical) { // если $vertical не равно true (т.е. если в аргумент переменной $vertical приходит значение false)
		$style = " style='display: inline; margin-right: 15px' ";
	}

	echo "<ul>";
	foreach ($menu as $item) { // $item - внутренний массив (это короткий foreach, когда нужны только значения ($item - Домой) )
		// echo "<ul>";
			echo "<li$style>"; // if false --- $style = " style='display: inline' " (html: <li" style='display: inline; margin-right: 15px' ">)
				echo "<a href='{$item['href']}'>  {$item['link']}  </a>"; // аналог записи в html: <a href = 'index.php'> Домой </a>
			echo "</li>";
		// echo "</ul>";
	}
	echo "<ul>";
/* $item['link' / 'href'] - другими словами link' / 'href (0 / 1)  - это номера элементов массива*/

// foreach с каждым цыклом перебирает многомерный массив. при первой итерации ключ link (0 (ноль) ), при второй - ключ - 1 и т.д. (ключ указывается в квадратных скобках, для того, чтобы понять какое значение переменной $item выводить)

/*
можно не экранировать { } - $item[link] (ключ link писать без кавычек---потому, что вся строка
в которой находится link и href попадает под двойные кавычки)
*/
	// обработка ошибки
return true; // чтобы было понятно, что функция отработала
}
// drawMenu() вызывается в файле menu.inc.php и data.inc.php
?>