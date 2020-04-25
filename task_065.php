<?php
/*
 * Task 65. Площадь многоугольника
 * Задача: дан массив с координатами вершин многоугольника. Нужно найти его площадь.
 * Входные данные: X - массив с координатами вершин по оси X, Y - массив с координатами вершин по оси Y.
 *
 * Пример: X = [0, 0, 2] Y = [0, 2, 0] Вывод: 2.
 *
 * Решение: https://ru.wikihow.com/найти-площадь-многоугольника
 * так как от перемены мест слогаемых сумма не меняется, сортировать по часовой не станем
 */

$x = [0, 0, 2];
$y = [0, 2, 0];

$length = count($x);
$res = 0;
foreach ($x as $k => $v) {
  if ($k == $length-1){
    $res += ($x[$k] + $x[0]) * ($y[$k] - $y[$k[0]]);
  } else {
    $res += ($x[$k] + $x[$k+1]) * ($y[$k] - $y[$k+1]);
  }
}
$res /= 2;

echo $res;