<?php
/*
 * Task 66. Степень двойки
 * Задача: дана строка, в ней последовательно записаны n степеней двойки, т.е. числа от 2 до 2 в степени n. Числа записаны без пробелов.
 * Напишите функцию, ктр выведет значение n, где 1 <= n <= 1000.
 *
 * Пример: 248163264128 Вывод: 7
 *
 * Идея: будем постепено отризать от строки каждую степень, пока не дойдем до конца
 */

include_once ('functions.php');
$str = '248163264128';
$n = 1;
$number = 2;
$str = substr($str, strlen((string) $number) - strlen($str));

while (strlen($str) > 0){
  $number *= 2;
  $str = substr($str, strlen((string) $number) - strlen($str));
  $n++;

  echo "$n: $number -> $str" . PHP_EOL;
  if ($str == $number) break;
}

echo $n;