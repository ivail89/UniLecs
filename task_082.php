<?php
/*
 * Task 82. Уравнение
 *
 * Задача: дано математическое уравнение a*x + b*y = 1.
 * Необходимо найти только целочиселнные решения этого уравнения и такие, что x >= 0.
 * Входные данные: a, b, где 0 <= a, b <= 10^9
 *
 * Вывод: минимально возможное неотрицательное значение x и соот-е для него целое значение y.
 * Если решения нет, вывести соот-е сообщение.
 *
 * Пример:
 * 1. a = 7, b = 11,  Answer: 8 -5
 * 2. a = 5, b = 3,   Answer: 2 -3
 *
 * Идея: алгоритм Евклида, позволяет определмить есть ли решения, дальше перебор
 */

include_once ('functions.php');
//list($a, $b) = [7, 11]; // (8 ; -5)
list($a, $b) = [5, 3]; // (2 ; -3)

$isResult = lcm($a, $b);

if ($isResult) {
  if ($b == 0) { // Потому что y = (1 - a * x) / b
    echo '(1 ; 0)';
  } else {
    $x = 1;
    while (1) {
      if ((1 - $a * $x) % $b == 0) {
        $y = intdiv((1 - $a * $x), $b); // Использую интдив, что бы не получить "пасхалку" от PHP
        break;
      }
      $x++;
    }
    echo "($x ; $y)";
  }

} else {
  echo 'Without roots';
}