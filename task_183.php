<?php
/*
 * #183. Игра ГО
 * Задача: на клетчатом поле игры ГО размером NxM остались два камня.
 * Необходимо определить максимально возможную площадь прямоугольника, которому принадлежит только один из камней.
 *
 * Входные данные: N,M - натуральные числа от 2 до 1000. Points[(x1, y1), (x2, y2)] - массив координат двух камней.
 * Вывод: площадь максимального прямоугольника
 *
 * Пример: N = 3, M = 4;
 * Points = [(2, 1), (4, 3)]
 * Answer = 9;
 */
require_once 'functions.php';

$n = 3;
$m = 4;
$x1 = 2;
$x2 = 4;
$y1 = 1;
$y2 = 3;


// нам не важна привязка значения x и y, поэтому можем сразу отсортировать
if ($x2 < $x1) {
  list($x1, $x2) = [$x2, $x1];
}
if ($y2 < $y1) {
  list($y1, $y2) = [$y2, $y1];
}

$res = [];
if ($x1 == $x2) { // одна коортината Х, значит по ней отсекать нельзя
  $res [] = 0;
} else {
  $res [] = max (
    ($x2 - 1) * $n,
    ($m - $x1) * $n
  );
}

if ($y1 == $y2) { // одна коортината Y, значит по ней отсекать нельзя
  $res [] = 0;
} else {
  $res [] = max (
    ($y2 - 1) * $m,
    ($n - $y1) * $m
  );
}

echo max($res);