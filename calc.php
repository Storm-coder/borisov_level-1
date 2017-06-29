<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$num1 = cleanInt ($_POST['num1']); // фильтрация данных ( cleanInt() - функция (lib.inc.php), возвращает целочисленное значение )
	$operator = cleanStr($_POST['operator']); // cleanStr() - функция (файл "lib.inc.php"), возвращает "strip_tags(trim($_POST['operator']))"
	$num2 = cleanInt($_POST['num2']);

	$output = "$num1 $operator $num2 = "; // шаблон для вывода значения (например, ввели 2 + 3  -  уже есть заготовка "2 + 3 =")
}
// $_SERVER['REQUEST_METHOD'] - устанавливает каким методом была отправлена форма (если форма отправлена методом POST - обработать её)

switch ($operator) { // если переменная $operator
	case '+':        // имее значение "+"
		$result = $num1 + $num2;
		break;
	case '-':
		$result = $num1 - $num2;
		break;
	case '*':
		$result = $num1 * $num2;
		break;
	case '/':
		if ($num2 === 0) { // проверка, в случае деления на ноль
			$result = "Деление на 0 запрещено!";
		}else {$result = $num1 / $num2;}
		break;

	default: // если никуда не попали
		$result = "Вы ввели неверный оператор '{$operator}'";
		break;
}

if (!$num1 & !$num2 & !$operator) {	// если не ввели значения
	$result = 'Пожалуйста, введите данные!';
}
?>

			<!-- Область основного контента -->
<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
	<label>Число 1:</label><br />
	<input name='num1' value="<?=$num1?>" type='text'/><br /> <!-- value - значение по умолчанию (в полях формы) -->
	<label>Оператор: </label><br />
	<input name='operator' value="<?=$operator?>" type='text'/><br />
	<label>Число 2: </label><br />
	<input name='num2' value="<?=$num2?>" type='text'/><br /><br />
	<input type='submit' value='Считать'>
</form>	
<!--REQUEST_URI - URI (адрес), который был передан для того, чтобы получить доступ к этой странице (указали, что обработчик находится на этой странице. но калькулятор отрисовывается на index.php - там в блоке "оснойной контент" есть условие)-->
			<!-- / Область основного контента -->
<h3>
	<?php
	if ($output == 0) { // проверка, если данные не ввели
		echo "Результат: {$result}";
	} else {
		echo 'Результат: ' . $output . $result;
	}
	?>
</h3>

<!-- Лучше всего отправлять форму методом POST, чтобы разграничить, когда пользователь запросил, а когда отправил эту форму (например, методом GET запросить страницу с формой, не нужно это форму обрабатывать)-->