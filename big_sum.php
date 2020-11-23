<?php
/*
 * Дана строка, содержащая два положительных целых числа, разделённых пробелом.
 * Числа могут быть большими и не умещаться в 64-битное целое. Нужно вывести сумму этих чисел.
 * https://habr.com/ru/company/badoo/blog/346652/
 */

$str = '9999 99999999';

$numbers = explode(' ', $str);
if (strlen($numbers[0]) > strlen($numbers[1])) {
  $numbers = [$numbers[1], $numbers[0]];
}

echo $numbers[0] + $numbers[1] . "</br>";

$len_str0 = strlen($numbers[0]) - 1;
$len_str1 = strlen($numbers[1]) - 1;

$delta = $len_str1 - $len_str0;
$rest = 0;
$result = '';
for ($i = 0; $i < $len_str0 + 1; $i++) {
  $a = (int)$numbers[0][$len_str0 - $i];
  $b = (int)$numbers[1][$len_str1 - $i];

  $c = $a + $b + $rest;
  if ($c > 9) {
    $result = ($c % 10) . $result;
    $rest = intdiv($c, 10);
  } else {
    $rest = 0;
    $result = $c . $result;
  }
}

for ($i = 0; $i < $delta; $i++) {
  $a = (int)$numbers[1][$len_str1 - $delta - $i];
  $c = $a + $rest;
  if ($c > 9) {
    $result = ($c % 10) . $result;
    $rest = intdiv($c, 10);
  } else {
    $rest = 0;
    $result = $c . $result;
    $head = substr($numbers[1], 0, $len_str1 - $delta - $i);
    $result = $head . $result;
    break;
  }
}

if ($rest > 0) {
  $result = $rest . $result;
}

echo $result;