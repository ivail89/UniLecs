<?php
/*
 * Task 78: Цифровой корень числа
 * Цифровой корень натурального числа — это цифра, полученная в результате итеративного процесса суммирования цифр,
 * на каждой итерации которого для подсчета суммы цифр берут результат, полученный на предыдущей итерации.
 * Этот процесс повторяется до тех пор, пока не будет получена одна цифра.
 *
 * Необходимо составить программу нахождения цифрового корня натурального числа.
 *
 * Входные данные: N - натуральное число, где 0 <= N <= 10^9
 * Вывод: цифровой корень числа N
 *
 * Пример: Number = 65536 DigitalRoot = 7
 */
include_once ('functions.php');

// Решение через строку
$n = 65536;
while ($n > 9) { // повторяем пока число не будем состояить из одной цифры
  $sum = 0;
  $str = (string)$n; // переводим число в строку
  for ($i = 0; $i < strlen($str); $i++) { // каждое число строки суммируем
    $sum += (int)$str[$i];
  }
  $n = $sum;
}
echo $sum . PHP_EOL;

// Решение через постенное уменьшение числа
$n = 65536;
while ($n > 9){ // повторяем пока сумма не будет состоять из одной цифры
  $sum = 0;
  while ($n > 9) { // повторяем пока не сложим все цифры числа
    $sum += $n % 10; // прибавляем крайнюю левую цифру
    $n = intdiv($n, 10); // получем новое число без послдней цифры
  }
  $sum += $n;
  $n = $sum;
}
echo $sum;