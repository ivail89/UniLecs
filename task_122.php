<?php
/*
 * UniLecs #122. Максимальная подматрица
 *
 * Задача: дана матрица N*M, состоящая из целых чисел. Необходимо определить подматрицу с максимальной суммой элементов в ней.
 * Входные данные: arr - матрица N*M, элементы матрицы целые числа по модулю меньше 1000. N,M - от 1 до 1000.
 * Вывод: максимальная сумма в подматрице исходной матрицы arr, а также координаты этой подматрицы.
 *
 * Пример:
[ { -1, -2, -3 },
 { 1, 1, -4 },
 { 1, 1, -5 } ]
MaxSum = 4; SubMatrix Coordinate: (2, 1) - (3, 2)
(подматрица с левой верхней вершиной (2,1) и правой нижней (3,2), нумерация с 1).

Решение в лоб, перебором. От каждой точки строим все возможные подматрицы и смотрим в них сумму
 */
require_once 'functions.php';
$matrix = [
  [-1, -2, -3],
  [1, 1, -4],
  [1, 1, -5]
];

$result = [
  'sum' => $matrix[0][0],
  'left_top' => [0, 0],
  'bottom_right' => [0, 0]
];

$hight = count($matrix);
$width = count($matrix[0]);
for ($y = 0; $y < $hight; $y++) { // перебираем строки
  for ($x = 0; $x < $width; $x++) { // перебираем столбцы
    for ($yy = $y; $yy < $hight; $yy++) { // перебираем строки, которые идут дальше, так как предыдущие попали в прошлых случаях
      for ($xx = $x; $xx < $width; $xx++) { // перебираем стобцы, которые идут далье, так как предыдущие смотрели раньше
        $subSum = sumSubMatrix($matrix, $x, $y, $xx, $yy);
        if ($subSum > $result['sum']) {
          $result['sum'] = $subSum;
          $result['left_top'] = [$x, $y];
          $result['bottom_right'] = [$xx, $yy];
        }
      }
    }
  }
}

print_r($result);