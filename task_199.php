<?php
/*
 * Анонс #199. Невозможная сумма
 * Задача: дан массив натуральных чисел. Необходимо определить минимальное натуральное число, которое не образуется суммой никаких из этих чисел.
 * Примечание: в сумму каждое исходное число может входить не более одного раза.
 * Входные данные: arr - массив натуральных чисел, размер массива от 1 до 10^4.
 * Вывод: искомое минимальное натуральное число.
 *
 * Пример:
 * 1. arr = [1, 1, 1, 5];
 * Output: 4.
 * 2. arr = [1, 2, 4, 8];
 * Output: 16
 */
require_once 'functions.php';

function task_199(array $arr): int
{
  $len = count($arr);
  $vars = setsOfBits($len);
  $sums = array();
  foreach ($vars as $var) {
    $sum = 0;
    for ($i = 0; $i < $len; $i++) {
      $sum += $var[$i] === '1' ? $arr[$i] : 0;
    }
    $sums[$sum] = true;
  }

  asort($sums);
  $i = 0;
  while (array_key_exists($i, $sums)) {
    $i++;
  }

  return $i;
}

echo task_199([1, 1, 1, 5]) . PHP_EOL;
echo task_199([1, 2, 4, 8]);