<?php
/*
 * Анонс #196. Стоимость арифметических операций
 *
 * Задача: определим следующую операцию: стоимость сложения двух чисел равна их сумме. Например,
 * стоимость операции сложения числа 1 и 2 равна 3, как и их сумма. Дан набор чисел, необходимо сложить все числа с наименьшей стоимостью.
 *
 * Входные данные: numbers[] - массив натуральных чисел не превосходящих 1000. Размер массива от 2 до 1000.
 * Вывод: наименьшую стоимость сложения всех чисел.
 *
 * Пример:
 *
 * Numbers[] = [ 1, 2, 3];
 *
 * Output:
 * 1й способ:  1 + 2 = 3 (Cost = 3); 3 + 3 = 6 (Cost = 6); Total Cost = 9;
 * 2й способ: 1 + 3 = 4 (Cost = 4); 4 + 2 = 6 (Cost = 6); Total Cost = 10;
 * 3й способ: 2 + 3 = 5 (Cost = 5); 1 + 5 = 6 (Cost = 6); Total Cost = 11;
 * Min Total Cost = 9;
 */
require_once 'functions.php';

function task_196(array $numbers): int
{
  $heap = new SplMinHeap;
  foreach ($numbers as $n) {
    $heap->insert($n);
  }
  $cost = 0;
  while ($heap->count() > 1) {
    $c = $heap->extract() + $heap->extract();
    $cost += $c;
    $heap->insert($c);
  }
  return $cost;
}

echo task_196([1, 2, 3]);