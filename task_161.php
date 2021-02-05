<?php
/*
 * Задача: необходимо вывести первые N строчек треугольника Паскаля.
 * Входные данные: N - натуральное число от 1 до 50.
 * Вывод: N строчек треугольника паскаля
 *
 * Пример: N=3
 *   1
 *  1 1
 * 1 2 1
 */
require_once 'functions.php';

function pascal(int $n)
{
  $n++;
  $d = [
    1 => '1',
    2 => '1 1'
  ];
  for ($i = 3; $i < $n; $i++) {
    $arr = explode(' ', $d[$i-1]);
    $arr_len = count($arr)-1;
    $next_line = '1 ';
    for ($j = 0; $j < $arr_len; $j++) {
      $sum = $arr[$j] + $arr[$j+1];
      $next_line .= ($sum . ' ');
    }
    $next_line .= '1';
    $d[] = $next_line;
  }

  return $d;
}

print_r(pascal(5));