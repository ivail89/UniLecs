<?php
/*
 * Анонс #169. Наименьший общий элемент
 * Задача: даны 3 числовых массива, отсортированные по возрастанию. Необходимо найти наименьшее число,
 * которое является общим для всех исходных массивов.
 *
 * Входные данные: arr1, arr2, arr3 - числовые массивы, элементы массива - целые числа по модулю не превосходящие 10^5.
 * Размеры массивов от 1 до 10^5.
 *
 * Пример:
 * arr1 = [ 1, 5, 10, 11, 90 ]
 * arr2 = [ -10, 5, 7, 8, 40 ]
 * arr3 = [ 0, 5, 6, 12, 20, 30 ]
 *
 * Answer: 5
 */
require_once 'functions.php';

$arr1 = [1, 5, 10, 11, 90];
$arr2 = [-10, 5, 7, 8, 40];
$arr3 = [0, 5, 6, 12, 20, 30];

$min1 = min($arr1);
$min2 = min($arr2);
$min3 = min($arr3);

while (true) {
  if ($min1 == $min2 && $min2 == $min3) {
    echo $min3;
    break;
  }
  if (empty($arr1) || empty($arr2) || empty($arr3)) {
    echo 'They do not have common elements';
    break;
  }
  $min = min($min1, $min2, $min3);
  switch ($min) {
    case $min1:
      $min1 = array_shift($arr1);
      break;
    case $min2:
      $min2 = array_shift($arr2);
      break;
    case $min3:
      $min3 = array_shift($arr3);
      break;
  }
}