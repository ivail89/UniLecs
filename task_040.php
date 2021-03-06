<?php
/*
 * Task 40. Проверяем число на простоту без циклов
 * Задача: дано натуральное число N. Написать функцию проверки числа на простоту.
 * Условие: нельзя использовать циклы.
 *
 * Решение: воспользуемся рекурсией, так как цикл использовать нельзя
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает
const N = 30;

for ($i = 4; $i < N; $i++){ // Это не цикл для решения задачи, а цикл для тестирования
  $m = (int) round(sqrt($i), PHP_ROUND_HALF_UP); // Достаточно проверить чтобы исходное число не делилось корень себя и все значения меньше корня
  echo $i . ' ' . checkPrime($i, $m) . PHP_EOL; // Вызываем рекурсивную функцию с проверкой исходного числа на корень
}

function checkPrime($n, $k){
  if (($n % $k) == 0) return "Isn't prime"; // Если число делится на что-то без остатка, то оно простое
  elseif ($k == 2) return "Is prime"; // Если дошли до числа два, значит число простое, при этом в предусловии проверили, что на два не делится
  else return checkPrime($n, --$k); // Проверяем дальше
}