<?php
/*
 * UniLecs #118. Сумма на дереве
 * Задача: дано дерево состоящее из N вершин, каждая вершина имеет значение value.
 * Необходимо определить такое множество вершин дерева, в котором никакие две вершины не имеет общего ребра, и сумма значений в этих вершинах максимальная.
 * Выведите максимально возможную сумму значений в таком множестве вершин.
 *
 * Входные данные: edges - список ребер, которым задано дерево; каждое ребро определятся двумя вершинами: (i, j).
 * value - упорядоченный массив значений (от 0 до 1000) в вершинах, где value(i) - значение вершины i (i от 1 до N; 1 <= N <= 10^4).
 * Вывод: максимальную сумму значений вершин в подмножестве.
 *
 * Пример:
 * Edges = [ (1, 2), (1, 3), (2, 4) ]
 * Value = [ 1, 1, 0, 1] (Пояснение: 1я вершина - значение 1; 2я вершина - 1; 3я вершина - 0; 4я вершина - 1)
 * Answer = 2
 */
require_once 'functions.php';

$edges = [
  [1,2],
  [1,3],
  [2,4]
];

$value = [
  1 => 1,
  2 => 1,
  3 => 0,
  4 => 1
];

// Представим дерево ввиде матрицы
$n = count($value);
$matrix = array_fill(1, $n, array_fill(1, $n, 0));
foreach ($edges as $v) {
  $matrix[$v[0]][$v[1]] = 1;
  $matrix[$v[1]][$v[0]] = 1;
}

// формиркем множества точек не имеющих общих ребер
$plenties = [];
foreach ($matrix as $line) {
  $plenty = [];
  foreach ($line as $index => $val) {
    if ($val == 0) {
      $plenty [] = $index;
    }
  }
  $plenties [] = $plenty;
}

unset($plenty);
array_map(function ($plenty){
  global $value;
  $sum = 0;
  foreach ($plenty as $el) {
    $sum += $value[$el];
  }
  echo $sum.PHP_EOL;
}, $plenties);