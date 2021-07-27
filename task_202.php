<?php
/*
 * Анонс #202. Сдвиг массива
 * Задача: дан массив целых чисел, необходимо сделать сдвиг элементов вправо на K шагов.
 * Входные данные: arr - массив натуральных чисел, размер массив от 1 до 10^6, K - натуральное число от 0 до 10^6.
 *
 * Вывод: преобразованный массив
 * Условие: для преобразования использовать только исходный массив.
 *
 * Пример:
 * 1. Arr = [1, 2, 3, 4, 5]; K = 3; Output: [3, 4, 5, 1, 2]
 * 2. Arr = [-5, -11, 0, 9, 3]; K = 2; Output: [9, 3, -5, -11, 0]
 *
 * Идея:
 * 1. Смещение на самом деле K = K % count(arr)
 * 2. Так как нумерация массива с 0, значит в i-индекс должен стать на позицию (i+(k-1)) % N
 */
require_once 'functions.php';

$arr1 = [1, 2, 3, 4, 5];
$arr2 = [-5, -11, 0, 9, 3];

function task_202(array $arr, int $k) : array
{
  $n = count($arr);
  $k %= $n;
  if ($k === 0) {
    return $arr;
  }

  $nn = $n; // сколько раз нужно повторить смещение
  $from_indx = 0;
  $from_val = $arr[0];
  while ($nn--) {
    $to_indx = ($from_indx + $k) % $n;
    $to_val = $arr[$to_indx];
    $arr[$to_indx] = $from_val;

    list($from_indx, $from_val) = [$to_indx, $to_val];
  }

  return $arr;
}

printArray(task_202($arr1, 3));
printArray(task_202($arr2, 2));