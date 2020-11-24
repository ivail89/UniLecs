<?php
/*
 * Дана строка, содержащая два положительных целых числа, разделённых пробелом.
 * Числа могут быть большими и не умещаться в 64-битное целое. Нужно вывести сумму этих чисел.
 * https://habr.com/ru/company/badoo/blog/346652/
 */

$str1 = '1 9';
$str2 = '1 99';
$str3 = '99 1';
$str4 = '123 123';
$str5 = '99999999999999999999999 88888888888888888888888';

function big_sum($str)
{
  $str = trim($str);
  list ($na, $nb) = explode(' ', $str);
  $la = strlen($na);
  $lb = strlen($nb);

  echo ($na + $nb) . ' - ';

  if ($la > $lb) {
    list($na, $nb) = [$nb, $na];
    list($la, $lb) = [$lb, $la];
  }

  $rest = 0;
  $result = '';
  for ($i = 0; $i < $lb; $i++) {
    $a = $la > $i ? (int)$na[$la - $i - 1] : 0;
    $b = (int)$nb[$lb - $i - 1];

    $sum = $a + $b + $rest;
    $result = ($sum % 10) . $result;
    $rest = intdiv($sum, 10);
  }

  return ($rest > 0) ? ($rest . $result) : $result;
}

echo big_sum($str1) . "</br>";
echo big_sum($str2) . "</br>";
echo big_sum($str3) . "</br>";
echo big_sum($str4) . "</br>";
echo big_sum($str5) . "</br>";